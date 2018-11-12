<?php

namespace App\Controller;

use Predis\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{

    protected $redis;

    public function __construct(Client $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @Route("/api/vote/like", name="api_vote_like")
     */

    public function voteLike(Request $request)
    {
        /**
         * Like button'una tıklayınca buraya istek geliyor. Kedi'nin id'sine göre redis'te puanı +1 artacak.
         */
        $id = $request->get('id');
        $redis = $this->redis;

        return new JsonResponse(array('status' => 'done'));
    }

    /**
     * @Route("/api/vote/dislike", name="api_vote_dislike")
     */

    public function voteDislike(Request $request)
    {
        /**
         * Dislike button'una tıklayınca buraya istek geliyor. Kedi'nin id'sine göre redis'te puanı -1 düşürülecek.
         */
        $id = $request->get('id');
        $redis = $this->redis;


        return new JsonResponse(array('status' => 'done'));
    }

    /**
     * @Route("/api/cat/list", name="api_cat_list")
     */
    public function catList()
    {
        /**
         * İlk edapta redis'te tutulan kedi puanlarını en yüksek skordan düşük skora göre sıralanacak sorgu yazılacak.(Bu sorgu redis'e yazılacak)
         * Ardından alınan kedi ID'lerinin MySQL'den çekilmesi gerekiyor (Bunun doctrine query'si yazarak yapılması gerek)
         * Daha sonra redis üzerinde tuttuğumuz puan ile beraber kedilerin detaylarını json olarak döndüreceğiz.
         * Dönmesi gereken datalar id, name, image ve score (score'un redis üzerinden alınması gerekiyor)
         */

        $em = $this->getDoctrine();
        $redis = $this->redis;

        return new JsonResponse();
    }
}
