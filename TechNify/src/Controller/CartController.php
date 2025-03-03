<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart_index')]
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        $cart = $session->get('cart', []);

        $cartData = [];
        $total = 0;

        foreach ($cart as $id => $quantity) {
            $product = $productRepository->find($id);
            if ($product) {
                $cartData[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
                $total += $product->getPrice() * $quantity;
            }
        }

        return $this->render('cart/cart.html.twig', [
            'cart' => $cartData,
            'total' => $total,
        ]);
        
    }

    #[Route('/cart/add/{id}', name: 'cart_add')]
    public function add(Product $product, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);

        $productId = $product->getId();

        if (!isset($cart[$productId])) {
            $cart[$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        } else {
            $cart[$productId]['quantity']++;
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_show');
    }

    #[Route('/cart', name: 'cart_show')]
    public function show(SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);

        return $this->render('cart/cart.html.twig', [
            'cart' => $cart
        ]);
    }
    #[Route('/cart/remove/{id}', name: 'cart_remove')]
    public function remove($id, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);

        if (!empty($cart[$id])) {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }
    #[Route('/cart/update/{id}', name: 'cart_update', methods: ['POST'])]
    public function update($id, Request $request, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);
        $quantity = (int) $request->request->get('quantity');

        if ($quantity > 0) {
            $cart[$id] = $quantity;
        } else {
            unset($cart[$id]);
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute('cart_index');
    }

    #[Route('/cart/clear', name: 'cart_clear')]
    public function clear(SessionInterface $session): Response
    {
        $session->remove('cart');

        return $this->redirectToRoute('cart_index');
    }
}
