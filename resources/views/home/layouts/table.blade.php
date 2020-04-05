<div class="table-responsive">
    <table class="table mt-3 table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th class="text-nowrap">ID</th>
            <th class="text-nowrap">Дата создания</th>
            <th class="text-nowrap">Номер заказа</th>
            <th class="text-nowrap">Номер накладной</th>
            <th class="text-nowrap">Откуда</th>
            <th class="text-nowrap">Куда</th>
            <th class="text-nowrap">Тип доставки</th>
            <th class="text-nowrap">Места</th>
            <th class="text-nowrap">Вес (кг)</th>
            <th class="text-nowrap">Обьем (м3)</th>
            <th class="text-nowrap">Статус</th>
            <th class="text-nowrap">Примечание</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            @php
                $invoice = '';
                $i = 1;
                foreach ($order['invoice'] as &$value) {
                    $bgColor = (sizeof($order['invoice'])>1)?(($i%2)?'bg-warning text-dark':'bg-success text-white'):'';
                    $invoice .= '<a href="/home/'.$order['id'].'"><div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$value['invoice_number'].'</div></a>';
                    $i++;
                }
                $receiver = '';
                $deliver = '';
                $place = '';
                $weight = '';
                $volume = '';
                $annotation = '';
                $i = 1;
                foreach ($order['receiver'] as &$value) {
                    $city = $cityModel->getCityById($value['city']);
                    $deliverData = $deliverModel->getTypeById($value['deliver_type']);
                    $bgColor = (sizeof($order['receiver'])>1)?(($i%2)?'bg-warning text-dark':'bg-success text-white'):'';
                    $receiver .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$city['russian_name'].'</div>';
                    $deliver .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$deliverData['russian_name'].'</div>';
                    $place .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$value['place'].'</div>';
                    $weight .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$value['weight'].'</div>';
                    $volume .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.$value['volume'].'</div>';
                    $annotation .= '<div class="text-no-wrap '.$bgColor.' p-1 text-center">'.(trim($value['annotation'])==''?'-':$value['annotation']).'</div>';
                    $i++;
                }
            @endphp

            <tr class="text-capitalize">
                <th class="text-nowrap">
                    <a href="/home/{{$order['id']}}">
                        <div class="text-no-wrap p-1 text-center">
                        {{$order['id']}}
                        </div>
                    </a>
                </th>
                <th class="text-nowrap">
                    <div class="text-no-wrap p-1 text-center">
                        {{date('j-m-Y', strtotime($order['created_at']))}}
                    </div>
                </th>
                <td class="text-nowrap">
                    <a href="/home/{{$order['id']}}">
                        <div class="text-no-wrap p-1 text-center">
                            {{$order['invoice'][0]['order_number']}}
                        </div>
                    </a>
                </td>
                <td class="text-nowrap">{!! $invoice !!}</td>
                <td class="text-nowrap">{{$order['city']['russian_name']}}</td>
                <td class="text-nowrap">{!! $receiver !!}</td>
                <td class="text-nowrap">{!! $deliver !!}</td>
                <td class="text-nowrap">{!! $place !!}</td>
                <td class="text-nowrap">{!! $weight !!}</td>
                <td class="text-nowrap">{!! $volume !!}</td>
                <td class="text-nowrap">{{$order['invoice'][0]['invoice_status']}}</td>
                <td class="text-nowrap">{!! $annotation !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
