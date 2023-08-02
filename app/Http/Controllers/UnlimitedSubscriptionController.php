<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\UnlimitedPriceList;
use App\Models\UnlimitedSubscription;
use Barryvdh\DomPDF\Facade\Pdf;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnlimitedSubscriptionController extends Controller
{
    // получить все записи (вывести все подписки на безлимит абонемент)
    public function getAllUnlimitedSubscriptions(): JsonResponse{
        return response()->json(UnlimitedSubscription::with( 'unlimited_price_list.subscription_type', 'customer')->orderByDesc('open')->get());
    }

    // получить все записи (вывести все подписки на безлимит абонемент) постранично
    public function unlimitedSubscriptions(): JsonResponse{
        return response()->json(UnlimitedSubscription::with('unlimited_price_list.subscription_type', 'customer')->orderByDesc('open')->paginate(12));
    }

    //Сторона Администратора: безлимит абонементы данного клиента.
    public function selectUnlimitedSubscriptionsByCustomer(Request $request): JsonResponse{
        $id = $request->input('customer');
        return response()->json(UnlimitedSubscription::with( 'unlimited_price_list', 'subscription_type')->where('customer_id', '=', $id)->get());
    }

    // добавить абонемент
    public function addUnlimitedSubscription(Request $request): JsonResponse //: Response
    {
        $subscription_type = $request->input('subscription_type');
        $validity_period = $request->input('validity_period');

        //Признак: оформлять вместе с абонементом подписку на групповые тренировки ?
        $isAddLimitedSubscription = $request->input('is_add_lim');

        $unlimited_price_list = UnlimitedPriceList::all()->where('subscription_type_id', $subscription_type)
            ->where('validity_period', $validity_period)->first();

        $customer_passport = $request->input('customer');

        $sub = new UnlimitedSubscription();
        $sub->customer_id = Customer::all()->where('passport',$customer_passport)->first()->id;
        $sub->unlimited_price_list_id = $unlimited_price_list->id;
        $sub->open = date_format(new DateTime(), 'Y-m-d' );

        $sub->save();

        if($isAddLimitedSubscription){
            LimitedSubscriptionController::addLimitedSubscription($request);

            //TODO добавить создание договора о покупки тренировок с тренером
        }

        //TODO добавить создание договора о покупки абонемента
        return response()->json(UnlimitedSubscription::with( 'unlimited_price_list.subscription_type', 'customer')->where('id',$sub->id)->first());//);//$this->generate('export-contract',"договор_клиента_№_паспорта=$customer_passport.pdf");

    }

    //генерация договора о оказании услуг  //TODO в разработке...
    public function generate(string $page, string $fileName): Response
    {
        $pdf = Pdf::loadView($page, [

        ]);

        return $pdf->download($fileName);
    }
}
