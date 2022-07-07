<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = microtime(true);

        $shipMethods = ['praesentium', 'qui', 'quis', 'atque', 'voluptatem', 'error', 'esse', 'minus'];

        $query = Orders::query()->with([
            'employee',
            'supplier',
            'customer',
            'shipper',
            'products' => function ($query) {
                $query->with('category');
            },
        ])
            ->where('order_number', '>', 100)
            ->where('order_number', '<', 900000)
            ->where('ship_address', 'LIKE', '%a%')
            ->whereNotIn('ship_method', $shipMethods)
            ->whereRaw('created_at >= LAST_DAY(NOW()) + INTERVAL 1 DAY - INTERVAL 26 MONTH')
            ->hasIn('products')
            ->hasIn('customer')
            ->hasIn('shipper')
            ->hasIn('supplier')
            ->groupBy('order_date')
            ->groupBy('order_number')
            ->orderBy('ship_date', 'desc')
            ->orderBy('updated_at', 'asc');

        $sqlRaw = Str::replaceArray('?', $query->getBindings(), $query->toSql());
        $sqlRaw = Str::replace('`', '', $sqlRaw);

        $data = [
            // 'result' => $query->paginate(10),
            // 'result' => $query->fastPaginate(10),
            // 'result' => $query->simplePaginate(10),
            'result' => $query->cursorPaginate(10),

            'elsapse' => round((microtime(true) - $start), 2) . 's',
            'sql_raw' => $sqlRaw,
        ];

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrdersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdersRequest  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
