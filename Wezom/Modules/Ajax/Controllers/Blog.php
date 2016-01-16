<?php
    namespace Wezom\Modules\Ajax\Controllers;

    use Core\Arr;
    use Core\HTML;
    use Core\QB\DB;

    class Blog extends \Wezom\Modules\Ajax {

        /**
         * Get one item information
         * $this->post['id'] => item ID
         */
        public function getItemAction() {
            $id = Arr::get($this->post, 'id', 0);
            $item = DB::select('blog.id', 'blog.name', 'blog.date', 'blog.image', array('blog_rubrics.name', 'rubric'))
                ->from('blog')
                ->join('blog_rubrics', 'LEFT')->on('blog_rubrics.id', '=', 'blog.rubric_id')
                ->where('blog.id', '=', $id)
                ->find();
            die(json_encode(array(
                'success' => true,
                'item' => array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'rubric' => $item->rubric,
                    'link' => HTML::link('wezom/blog/edit/'.$item->id),
                    'date' => $item->date ? date('d.m.Y', $item->date) : NULL,
                    'image' => is_file(HOST.HTML::media('images/blog/small/'.$item->image)) ? HTML::media('images/blog/small/'.$item->image) : NULL,
                    'image_big' => is_file(HOST.HTML::media('images/blog/medium/'.$item->image)) ? HTML::media('images/blog/big/'.$item->image) : NULL,
                ),
            )));
        }

        /**
         * Get items list by some parameters
         * $this->post['id'] => current item ID
         * $this->post['parent_id'] => search item group ID
         * $this->post['search'] => search item artikul or name (or part of it)
         */
        public function searchItemsAction() {
            $parent_id = (int) Arr::get($this->post, 'blog_id');
            $search = Arr::get($this->post, 'search');
            $limit = (int) Arr::get($this->post, 'limit', 1);
            $page = (int) Arr::get($this->post, 'page', 1);
            $offset = ($page - 1) * $limit;
            if( !$parent_id && !trim($search) ) {
                $this->error(array(
                    'count' => 0,
                    'items' => array(),
                ));
            }

            $result = DB::select('blog.id', 'blog.name', 'blog.image', array('blog_rubrics.name', 'rubric'))
                ->from('blog')
                ->join('blog_rubrics', 'LEFT')->on('blog_rubrics.id', '=', 'blog.rubric_id');
            if( $parent_id > 0 ) {
                $result->where('blog.rubric_id', '=', $parent_id);
            }
            if( trim($search) ) {
                $result->where('blog.name', 'LIKE', '%'.$search.'%');
            }

            $result = $result
                ->group_by('blog.id')
                ->limit($limit)
                ->offset($offset)
                ->find_all();

            $count = DB::select(array(DB::expr('COUNT(DISTINCT blog.id)'), 'count'))->from('blog');
            if( $parent_id > 0 ) {
                $count->where('blog.rubric_id', '=', $parent_id);
            }
            if( trim($search) ) {
                $count->where('blog.name', 'LIKE', '%'.$search.'%');
            }
            $count = $count->count_all();

            $items = array();
            foreach( $result AS $obj ) {
                $items[] = array(
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'rubric' => $obj->rubric,
                    'image' => is_file(HOST.HTML::media('images/blog/small/'.$obj->image)) ? HTML::media('images/blog/small/'.$obj->image) : NULL,
                );
            }
            $this->success(array(
                'count' => $count,
                'items' => $items,
            ));
        }
    }