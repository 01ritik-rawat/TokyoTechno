@extends('adminMaster')
@section('content')



<div class="container">
  <h2>Add a Product</h2>
  <form action="/admin/add_product" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Product name -->
    <div class="mb-3">
      <label for="productName" class="form-label"> Name</label>
      <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    
    <!-- Product price -->
    <div class="mb-3">
      <label for="productName" class="form-label"> Price</label>
      <input type="number" class="form-control" id="productName" name="productPrice" required>
    </div>

    <!-- Product description -->
    <div class="mb-3">
      <label for="productDescription" class="form-label"> Description</label>
      <textarea class="form-control" id="productDescription" name="productDescription" rows="3" required></textarea>
    </div>

    <!-- Product category -->
    <div class="mb-3">
      <label for="productCategory" class="form-label"> Category</label>
      <select class="form-select" id="productCategory" name="productCategory" required>
        <option selected disabled value="">Select Category</option>

        @foreach ($categoryLookup as $category )
        <option value="{{ array_keys($categoryLookup, $category)[0] }}">{{$category}}</option>
          
        @endforeach
        
      </select>
    </div>

    <!-- Product banner URL -->
    <div class="mb-3">
      <label for="productBanner" class="form-label"> Banner URL</label>
      <input type="url" class="form-control" id="productBanner" name="productBanner" required>
    </div>

    <!-- Product profile image -->
    <div class="mb-3">
      <label for="productImage" class="form-label">Product Image URL</label>
      <input type="url" class="form-control" id="productImage" name="productImage" required>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
  </form>
</div>


@endsection