@extends('layouts.layout')
@section('title',  session('product_group')->tennhom ?? 'Danh sách sản phẩm')
@section('content')
<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">

            @include('includes.categories',['categories' => $categories])
            @include('includes.products')
        </div>
    </div>

</div>
<script>

    const categoryElements = document.querySelectorAll(".category-item")
    categoryElements.forEach(categoryElement => {
        categoryElement.addEventListener("click", () => {
            categoryElement.classList.toggle("show");
            categoryElement.classList.toggle("category-item--active");

        })
    })
    const a = document.querySelectorAll(".category-item__link")
    a.forEach(categoryElement => {
        categoryElement.addEventListener("click", () => {
            categoryElement.classList.toggle("category-item--active");

        })
    })
</script>
@endsection
