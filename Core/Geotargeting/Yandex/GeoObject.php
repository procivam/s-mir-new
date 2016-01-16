<?php
    namespace Core\Geotargeting\Yandex;
    /**
     * Class GeoObject
     * @package Core\Geotargeting\Yandex
     * @author Dmitry Kuznetsov <kuznetsov2d@gmail.com>
     * @license The MIT License (MIT)
     */
    class GeoObject
    {
        protected $_data;
        protected $_rawData;
        public function __construct(array $rawData)
        {
            $data = array(
                'Address' => $rawData['metaDataProperty']['GeocoderMetaData']['text'],
            );
            array_walk_recursive($rawData, function($value, $key) use(&$data) {
                if (in_array($key, array('CountryName', 'CountryNameCode', 'AdministrativeAreaName', 'SubAdministrativeAreaName', 'LocalityName', 'DependentLocalityName', 'ThoroughfareName', 'PremiseNumber'))) {
                    $data[$key] = $value;
                }
            });
            if (isset($rawData['Point']['pos'])) {
                $pos = explode(' ', $rawData['Point']['pos']);
                $data['Longitude'] = (float)$pos[0];
                $data['Latitude'] = (float)$pos[1];
            }
            $this->_data = $data;
            $this->_rawData = $rawData;
        }
        public function __sleep()
        {
            return array('_data');
        }
        /**
         * Необработанные данные
         * @return array
         */
        public function getRawData()
        {
            return $this->_rawData;
        }

        /**
         * Обработанные данные
         * @return array
         */
        public function getData()
        {
            return $this->_data;
        }
        /**
         * Широта в градусах. Имеет десятичное представление с точностью до семи знаков после запятой
         * @return float|null
         */
        public function getLatitude()
        {
            return isset($this->_data['Latitude']) ? $this->_data['Latitude'] : null;
        }
        /**
         * Долгота в градусах. Имеет десятичное представление с точностью до семи знаков после запятой
         * @return float|null
         */
        public function getLongitude()
        {
            return isset($this->_data['Longitude']) ? $this->_data['Longitude'] : null;
        }
        /**
         * Полный адрес
         * @return string|null
         */
        public function getAddress()
        {
            return isset($this->_data['Address']) ? $this->_data['Address'] : null;
        }
        /**
         * Страна
         * @return string|null
         */
        public function getCountry()
        {
            return isset($this->_data['CountryName']) ? $this->_data['CountryName'] : null;
        }
        /**
         * Код страны
         * @return string|null
         */
        public function getCountryCode()
        {
            return isset($this->_data['CountryNameCode']) ? $this->_data['CountryNameCode'] : null;
        }
        /**
         * Административный округ
         * @return string|null
         */
        public function getAdministrativeAreaName()
        {
            return isset($this->_data['AdministrativeAreaName']) ? $this->_data['AdministrativeAreaName'] : null;
        }
        /**
         * Область/край
         * @return string|null
         */
        public function getSubAdministrativeAreaName()
        {
            return isset($this->_data['SubAdministrativeAreaName']) ? $this->_data['SubAdministrativeAreaName'] : null;
        }
        /**
         * Населенный пункт
         * @return string|null
         */
        public function getLocalityName()
        {
            return isset($this->_data['LocalityName']) ? $this->_data['LocalityName'] : null;
        }
        /**
         * @return string|null
         */
        public function getDependentLocalityName()
        {
            return isset($this->_data['DependentLocalityName']) ? $this->_data['DependentLocalityName'] : null;
        }
        /**
         * Улица
         * @return string|null
         */
        public function getThoroughfareName()
        {
            return isset($this->_data['ThoroughfareName']) ? $this->_data['ThoroughfareName'] : null;
        }
        /**
         * Номер дома
         * @return string|null
         */
        public function getPremiseNumber()
        {
            return isset($this->_data['PremiseNumber']) ? $this->_data['PremiseNumber'] : null;
        }
    }