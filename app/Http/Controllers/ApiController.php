<?php
    /**
     * ApiController
     * authors Hefa
     * date    2019-05-09 09:50
     * version 0.1
     */

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;

    class ApiController
    {

        public function list(){
            $select = [
                'id as BookId',
                'title as BookTitle',
                'author as Author',
                'descript as Descript',
                'client as Hits',
                'time as UpdateTime'
            ];

            $list = DB::table('book')
                ->select($select)
                ->orderBy('client' , 'DESC')
                ->take(16)->get();

            return ['code' => 0, 'data' => $list];
        }

        public function book(int $bookId){
            $select = [
                'id as BookId',
                'title as BookTitle',
                'author as Author',
                'descript as Descript',
                'client as Hits'
            ];

            $book = DB::table('book')->select($select)->find($bookId);

            if ($book){
                $select = [
                    'id as ChapterId',
                    'title as ChapterTitle',
                    'time as UpdateTime'
                ];

                $chapters = DB::table('chapter')
                    ->select($select)
                    ->where('bid' , $bookId)->get();

                $book->chapter = $chapters;
            }


            return ['code' => 0 ,'data' => $book];
        }


        public function chapter(int $chapterId){
            $select = [
                'id as ChapterId',
                'bid as BookId',
                'content as Context',
                'title as ChapterTitle'
            ];

            $chapter = DB::table('chapter')->select($select)->find($chapterId);


            if (!$chapter) $chapter=[];

            return ['code' => 0 , 'data' => $chapter];

        }

    }
