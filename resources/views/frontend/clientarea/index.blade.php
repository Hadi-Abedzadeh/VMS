@extends('layouts.sub-layout')
@section('content')

    <main class="main-responsive">
        <div class="title-page">
            <div class="container">
                <div class="row">
                    <h1>{{ trans('ui.text.clientarea') }}</h1>
                </div>
            </div>
        </div>

        <div class="blog-list">
            <div class="container">
                <div class="row">
                    <div class="container">
                            <table style="border: 1px solid black; width: 100%; ">
                                <thead style="  height: 50px; background: #F16334">
                                    <tr style="height: 50px;">
                                        <th class="pt-10 col-lg-3">{{ trans('ui.text.course') }}</th>
                                        <th class="pt-10 col-lg-2">{{ trans('ui.text.gateway') }}</th>
                                        <th class="pt-10 col-lg-2">{{ trans('ui.text.price') }}</th>
                                        <th class="pt-10 col-lg-1">{{ trans('ui.text.status') }}</th>
                                        <th class="pt-10 col-lg-2">{{ trans('ui.text.date') }}</th>
                                        <th class="pt-10 col-lg-2">{{ trans('ui.text.order') }}</th>
                                    </tr>
                                </thead>
                                <tbody>


                            @foreach($user_purchases as $user_purchase)
                                <tr style="border: 1px solid black; height: 50px;">
                                    <td class="pt-10 col-lg-3 text-center"><a href="{{ route('courses.list', $user_purchase->courses->slug) }}">{{to_persian($user_purchase->courses->title)}}</a></td>
                                    <td class="pt-10 col-lg-2 text-center">{{ to_persian($user_purchase->gateway) }}</td>
                                    <td class="pt-10 col-lg-2 text-center">{{ trans('ui.text.toman') }} {{ to_persian($user_purchase->amount) }}</td>
                                    <td class="pt-10 col-lg-1 text-center">پرداخت</td>
                                    <td class="pt-10 col-lg-2 text-center">{{ to_persian($user_purchase->created_at) }}</td>
                                    <td class="pt-10 col-lg-2 text-center">{{ to_persian($user_purchase->authority) }}</td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection
