@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Purchase Page </h4><br><br>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Date</label>
                                    <input class="form-control example-date-input" type="date"  id="date" name="date">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Purchase No</label>
                                    <input class="form-control example-date-input" type="text"  id="purchase_no" name="purchase_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label">Supplier Name</label>
                                    <select name="supplier_id" class="form-select" id="supplier_id" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                    @foreach($supplier as $supp)
                                                    <option value="{{ $supp->id }}"> {{ $supp->name }}</option>
                                                    @endforeach
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:20px;">Category Name</label>
                                    <select name="category_id" class="form-select"  id="category_id" aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                   
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:20px;">Product Name</label>
                                    <select name="product_id" class="form-select" id="product_id"
                                    aria-label="Default select example">
                                                    <option selected="">Open this select menu</option>
                                                   
                                                </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="md-3">
                                    <label for="example-text-input" class="form-label" style="margin-top:63px;"></label>
                                    <input type="submit" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Add More">
                                </div>
                            </div>
                        </div>     <!-- end row -->



                     



                    </div> <!-- end card body -->
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>







@endsection