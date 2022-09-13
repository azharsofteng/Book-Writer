<div class="card cus-dashboard">
    <div class="card-header">
        <a href="{{ route('customer.dashboard') }}">
            <h5 class="m-0 py-1"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</h5>
        </a>
    </div>

    <div class="list-group customer_sidebar">
        <a href="" class="list-group-item list-group-item-action">
            <i class="fa fa-user" aria-hidden="true"></i> Profile Update
        </a>
        <a href="{{ route('customer.all.order') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-list" aria-hidden="true"></i> All Orders
        </a>
        <a href="{{ route('customer.pending.order') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-spinner" aria-hidden="true"></i> Pending Order
        </a>
        <a href="{{ route('customer.approved.order') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-thumbs-up" aria-hidden="true"></i> Delivered Order
        </a>
        <a href="{{ route('customer.canceled.order') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-ban" aria-hidden="true"></i> Canceled Order
        </a>
        <a href="{{ route('customer.change.password') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-lock" aria-hidden="true"></i> Change Password
        </a>

        <a href="{{ route('customer.logout') }}" class="list-group-item list-group-item-action">
            <i class="fa fa-power-off" aria-hidden="true"></i> 
            Logout
        </a>
        
    </div>
</div>