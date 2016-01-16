<?php
    namespace Core\Geotargeting\Yandex;
    use Core\HTML;

    /**
     * Class Api
     * @package Yandex\Geo
     * @author Dmitry Kuznetsov <kuznetsov2d@gmail.com>
     * @license The MIT License (MIT)
     * @see http://api.yandex.ru/maps/doc/geocoder/desc/concepts/About.xml
     */
    class Api
    {
        /** дом */
        const KIND_HOUSE = 'house';
        /** улица */
        const KIND_STREET = 'street';
        /** станция метро */
        const KIND_METRO = 'metro';
        /** район города */
        const KIND_DISTRICT = 'district';
        /** населенный пункт (город/поселок/деревня/село/...) */
        const KIND_LOCALITY = 'locality';
        /** русский (по умолчанию) */
        const LANG_RU = 'ru-RU';
        /** украинский */
        const LANG_UA = 'uk-UA';
        /** белорусский */
        const LANG_BY = 'be-BY';
        /** американский английский */
        const LANG_US = 'en-US';
        /** британский английский */
        const LANG_BR = 'en-BR';
        /** турецкий (только для карты Турции) */
        const LANG_TR = 'tr-TR';
        /**
         * @var string Версия используемого api
         */
        protected $_version = '1.x';
        /**
         * @var array
         */
        protected $_filters = array();
        /**
         * @var \Core\Geotargeting\Yandex\Response|null
         */
        protected $_response;
        /**
         * @param null|string $version
         */
        public function __construct($version = null)
        {
            if (!empty($version)) {
                $this->_version = (string)$version;
            }
            $this->clear();
        }
        public function load()
        {
            $apiUrl = sprintf('https://geocode-maps.yandex.ru/%s/?%s', $this->_version, http_build_query($this->_filters));
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $apiUrl);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_REFERER, NULL);
            curl_setopt($curl, CURLOPT_USERAGENT, "Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.9.168 Version/11.51");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // не проверять SSL сертификат
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); // не проверять Host SSL сертификата
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $data = curl_exec($curl);
            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            if (curl_errno($curl)) {
                curl_close($curl);
                throw new \Core\Geotargeting\Yandex\Exception\CurlError(curl_error($curl));
            }
            curl_close($curl);
            if (in_array($code, array(500, 502))) {
                $msg = strip_tags($data);
                throw new \Core\Geotargeting\Yandex\Exception\ServerError(trim($msg), $code);
            }
            $data = json_decode($data, true);
            if (empty($data)) {
                $msg = sprintf('Can\'t load data by url: %s', $apiUrl);
                throw new \Core\Geotargeting\Yandex\Exception($msg);
            }
            $this->_response = new \Core\Geotargeting\Yandex\Response($data);
            return $this;
        }
        /**
         * @return Response
         */
        public function getResponse()
        {
            return $this->_response;
        }
        /**
         * Очистка фильтров гео-кодирования
         * @return self
         */
        public function clear()
        {
            $this->_filters = array(
                'format' => 'json'
            );
            // указываем явно значения по-умолчанию
            $this
                ->setLang(self::LANG_RU)
                ->setOffset(0)
                ->setLimit(10);
    //            ->useAreaLimit(false);
            $this->_response = null;
            return $this;
        }
        /**
         * Гео-кодирование по координатам
         * @see http://api.yandex.ru/maps/doc/geocoder/desc/concepts/input_params.xml#geocode-format
         * @param float $longitude Долгота в градусах
         * @param float $latitude Широта в градусах
         * @return self
         */
        public function setPoint($longitude, $latitude)
        {
            $longitude = (float)$longitude;
            $latitude = (float)$latitude;
            $this->_filters['geocode'] = sprintf('%f,%f', $longitude, $latitude);
            return $this;
        }
        /**
         * Географическая область поиска объекта
         * @param float $lengthLng Разница между максимальной и минимальной долготой в градусах
         * @param float $lengthLat Разница между максимальной и минимальной широтой в градусах
         * @param null|float $longitude Долгота в градусах
         * @param null|float $latitude Широта в градусах
         * @return self
         */
        public function setArea($lengthLng, $lengthLat, $longitude = null, $latitude = null)
        {
            $lengthLng = (float)$lengthLng;
            $lengthLat = (float)$lengthLat;
            $this->_filters['spn'] = sprintf('%f,%f', $lengthLng, $lengthLat);
            if (!empty($longitude) && !empty($latitude)) {
                $longitude = (float)$longitude;
                $latitude = (float)$latitude;
                $this->_filters['ll'] = sprintf('%f,%f', $longitude, $latitude);
            }
            return $this;
        }
        /**
         * Позволяет ограничить поиск объектов областью, заданной self::setArea()
         * @param boolean $areaLimit
         * @return self
         */
        public function useAreaLimit($areaLimit)
        {
            $this->_filters['rspn'] = $areaLimit ? 1 : 0;
            return $this;
        }
        /**
         * Гео-кодирование по запросу (адрес/координаты)
         * @param string $query
         * @return self
         */
        public function setQuery($query)
        {
            $this->_filters['geocode'] = (string)$query;
            return $this;
        }
        /**
         * Вид топонима (только для обратного геокодирования)
         * @param string $kind
         * @return self
         */
        public function setKind($kind)
        {
            $this->_filters['kind'] = (string)$kind;
            return $this;
        }
        /**
         * Максимальное количество возвращаемых объектов (по-умолчанию 10)
         * @param int $limit
         * @return self
         */
        public function setLimit($limit)
        {
            $this->_filters['results'] = (int)$limit;
            return $this;
        }
        /**
         * Количество объектов в ответе (начиная с первого), которое необходимо пропустить
         * @param int $offset
         * @return self
         */
        public function setOffset($offset)
        {
            $this->_filters['skip'] = (int)$offset;
            return $this;
        }
        /**
         * Предпочитаемый язык описания объектов
         * @param string $lang
         * @return self
         */
        public function setLang($lang)
        {
            $this->_filters['lang'] = (string)$lang;
            return $this;
        }
        /**
         * Ключ API Яндекс.Карт
         * @see http://api.yandex.ru/maps/form.xml
         * @param string $token
         * @return self
         */
        public function setToken($token)
        {
            $this->_filters['key'] = (string)$token;
            return $this;
        }
    }