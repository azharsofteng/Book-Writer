@extends('pages.customer.index')
@section('customer')
<section id="dashboard">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.customer.sidebar')
            </div>
            <div class="col-md-9">
                <div class="top_card">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <a href="">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-spinner fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Pending Order</h4>
                                </div>
                            </a>

                        </div>

                        <div class="col-md-4 mb-2">
                            <a href="">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-thumbs-up fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Delivered Order</h4>
                                </div>
                            </a>

                        </div>

                        <div class="col-md-4 mb-2">
                            <a href="">
                                <div class="top_card_sec text-center effect2">
                                    <i class="fa fa-ban text-danger fa-2x mb-2" aria-hidden="true"></i>
                                    <h4>Canceled Order</h4>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="order_list py-2 table-responsive">

                    <h4 class="text-black fw-bold"><i class="fa fa-list-alt" aria-hidden="true"></i> Latest Order</h4>

                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Order No</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection