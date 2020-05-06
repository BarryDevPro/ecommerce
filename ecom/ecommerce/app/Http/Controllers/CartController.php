<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CommandeInterface;
use App\Http\Repositories\DetailCommandeInterface;
use App\Http\Repositories\ProduitInterface;
use App\Model\ProduitQte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    private $produitRepository;
    private $commandeRepository;
    private $detComRepository;
    public function __construct(ProduitInterface $produitInterface , CommandeInterface $commandeInterface , DetailCommandeInterface $detailCommandeInterface)
    {
        $this->produitRepository = $produitInterface;
        $this->commandeRepository = $commandeInterface;
        $this->detComRepository = $detailCommandeInterface;
    }
    public function index()
    {
        $cart = session('cart' , collect());
        session()->put('cart' , $cart);
        // session()->forget('cart');
        $total = 0;

        if (count($cart) > 0) {
            foreach ($cart as $p) {
                $total += $p->getProduit()->prixUnitaire * $p->getQuantite();
            }
        }
        session()->put('total' , $total);
        return view('front.cart');

    }

    public function store(Request $request) 
    {
        $cart = session('cart' , collect());
        $qte = (int)$request->get('quantite' , 1);
        $produit = $this->produitRepository->findById((int)$request->get('id'));
        $produitQte = new ProduitQte($produit , $qte);
        $key = 'cart-'.$produit->id;
        if ($cart->has($key)) {
            $p = $cart[$key];
            $p->setQuantite($p->getQuantite() + $qte);
            $cart[$key] =  $p ; 
        }else {
            $cart[$key] = $produitQte;
        }

        session()->put('cart' , $cart);

        
       
        return redirect()->route('cart.get');
    }

    public function update(Request $request)
    {
        $cart = session('cart' , collect());
        $qte = (int)$request->get('quantite' , 1);
        $produit = $this->produitRepository->findById((int)$request->get('id'));
        $key = 'cart-'.$produit->id;
        $p = $cart[$key];
        $p->setQuantite($qte);
        $cart[$key] =  $p ; 
        session()->put('cart' , $cart);
        return redirect()->route('cart.get');

    }
    public function delete(Request $request)
    {
        $cart = session('cart' , collect());
        unset($cart[$request->get('key')]);
        session()->put('cart' , $cart);
        
        return redirect()->route('cart.get');

    }

    public function valider()
    {
        $cart = session('cart' , collect());
        $total = session('total' , 0);
        $client = session()->get('client');
        
        if ($total == 0) {
            return redirect()->route('home');
        }else{
            if ($client != null) {
            
                $arrayCom = ['montant' => $total , 'clients_id' => $client->id , 'dateCommande' => now()];
                $this->commandeRepository->store($arrayCom);
                $idCom = DB::table('commandes')->max('id');
                foreach ($cart as $produitQte) {
                    $arrayDetCom = [
                        'commandes_id' => $idCom , 'produits_id' => $produitQte->getProduit()->id ,
                        'prixTotal' => $produitQte->getProduit()->prixUnitaire * $produitQte->getQuantite(),
                        'quantite' => $produitQte->getQuantite()
                        ];
                    $this->detComRepository->store($arrayDetCom);
                }
    
                session()->forget('cart');
                session()->forget('total');
    
                return redirect()->route('home');
    
            }else{
                return redirect()->route('connexion.get');
            }
        }

    }
}
