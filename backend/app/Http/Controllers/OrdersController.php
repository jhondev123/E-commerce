<?php

namespace App\Http\Controllers;

use App\Application\DTO\Order\StoreOrderDTO;
use DateTime;
use App\Facades\DbConfig;
use Illuminate\Http\Request;
use App\Domain\Entities\User;
use App\Domain\Enums\OrderStatus;
use App\Domain\Enums\PaymentStatus;
use App\Domain\Entities\Order\Order;
use App\Domain\Enums\PaymentMethods;
use App\Domain\Entities\Order\Delivery;
use App\Domain\Entities\Order\OrderItem;
use App\Http\Requests\StoreOrderRequest;
use App\Application\Services\OrderService;
use App\Domain\Entities\Order\OrderPayment;
use App\Application\Services\ToppingsService;
use App\Application\Services\ProductsServices;
use App\Application\Services\User\UserService;

class OrdersController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private ProductsServices $productService,
        private ToppingsService $toppingService,
        private UserService $userService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function getProductByUserId($id)
    {
        return response()->json($this->orderService->getOrderByUserId($id));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        // validar os dados de entrada
        // criar o endereço da entrega
        // criar o cliente
        // criar a entrega 
        // criar os items no pedido
        // criar o pagamento
        // Pegar o respectivo usuário do pedido
        // definir o status do pagamento como pendente
        // definir o status do pedido como pendente

        // pegando o address selecionado
        $addressId = $request->get('address_id');

        // pegando o usuário do pedido
        $userDto = $this->userService->getByUserId($request->get('user_id'));
        $user = $userDto->toEntity();

        //pegando o endereço selecionado para entrega
        $addressSelected = $user->getAddressById($addressId);

        //criando o delivery
        $delivery = new Delivery(DbConfig::get('delivery_fee'), $addressSelected, new DateTime());

        //pegando os itens no pedido
        $orderItems = [];
        foreach ($request->get('items') as $item) {
            $product = $this->productService->getProductByIdToEntity($item['product_id']);
            $toppings = [];
            foreach ($item['toppings'] as $topping) {
                $toppings[] = $this->toppingService->getToppingByIdToEntity($topping);
            }
            $orderItem = new OrderItem($product, $item['quantity']);
            $orderItem->setToppings($toppings);
            $orderItems[] = $orderItem;
        }
        // criando o pagamento
        $orderPayment = new OrderPayment(
            PaymentMethods::from($request->get('payment_method')),
            PaymentStatus::PENDING
        );

        $order = new StoreOrderDTO(
            $orderItems,
            $orderPayment,
            $user,
            $delivery,
            OrderStatus::AWAITING_PAYMENT
        );
        try {
            $orderCreated = $this->orderService->store($order);
            return response()->json($orderCreated, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }


    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
