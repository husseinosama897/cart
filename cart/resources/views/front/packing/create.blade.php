@extends('layouts.app')

@section('content')
    <div class="container"> 
        <div class="page-details" style="padding:4rem;text-align: center">
            <h2>طلب تغليفات مخصصة</h2>
            <p class="pt-2">يمكنك عمل تغليفات مخصصة طبوع عليها الونا هويتك والشعار الخاص بكم</p>
        </div>
        <create-packing></create-packing>
    </div>
@endsection
@section('style')

<style>
    .orders {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .order {
        background: #EBF2F1;
        padding: 80px;
        text-align: center;
        border-radius: 20px;
        max-width: 1024px;
        position: relative;
    }
    @media (max-width: 479px) { 
        .page-products .product {
            text-align: center;
        }
    }
    @media (min-width: 480px) { 
        .page-products .product {
            width: calc(50% - 10px);
        }
    }
    @media (min-width: 576px) { 
        .page-products .product {
            width: calc(33.33% - 10px);
        }
    }
    @media (min-width: 768px) { 
        .page-products .product {
            width: calc(25% - 10px);
        }
    }
    @media (min-width: 992px) { 
        .page-products .product {
            width: calc(20% - 10px);
        }
    }
    .page-products .product .photo{
        
    }
.drop-smenu{
    position: relative;
    display: none;
}
@media (min-width:992px){
    .drop-smenu{
        display: block;
    }
}
.drop-search {
    opacity: 0;
    visibility: hidden;
    padding: 10px;
    position: absolute;
    z-index: 2;
    top: -30px;
    width: 100%;
    background: #F9FAFC;
    border-radius: var(--borderRadius);
    box-shadow: 0 25px 50px -12px rgb(0 0 0 / 25%);
    transition: all 500ms, color 200ms;
    right: 0;
}
.drop-search li {
    position: relative;
    padding: 10px;
    border-radius: var(--borderRadius);
}
.drop-search li:hover {
    background: #eeeff3;
}
.drop-search li a{
    font-size: 14px;
}
.drop-search li a .name-search {
    font-weight: bold;
}
.drop-search li a .name-search svg {
    float: right;
    margin-left: 10px;
}
.drop-search li a .close-search {
    float: left;
}
.drop-search.active {
    opacity: 1;
    visibility: visible;
    top: 57px;
}
/* End Dropdown-search */
</style>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>

@endsection