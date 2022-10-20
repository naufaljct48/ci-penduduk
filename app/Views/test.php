<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Lists</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/custom.min.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <div class="container">
    <h3>Product Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jumlah Penduduk</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($penduduk as $row) : ?>
                <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['jumlah_penduduk'];?></td>
                    <td><?= $row['bulan'];?></td>
                    <td><?= $row['tahun'];?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id'];?>" data-jumlah="<?= $row['jumlah_penduduk'];?>" data-bulan="<?= $row['bulan'];?>" data-tahun="<?= $row['tahun'];?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id'];?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 
    </div>
     
    <!-- Modal Add Product-->
    <form action="/product/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                </div>
 
                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($penduduk as $row):?>
                        <option value="<?= $row['id'];?>"><?= $row['id'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 
    <!-- Modal Edit Product-->
    <form action="/product/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control product_price" name="product_price" placeholder="Product Price">
                </div>
 
                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control product_category">
                        <option value="">-Select-</option>
                        <?php foreach($penduduk as $row):?>
                        <option value="<?= $row['id'];?>"><?= $row['id'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="/product/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this product?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://bootswatch.com/_assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const jumlah_penduduk = $(this).data('jumlah_penduduk');
            const bulan = $(this).data('bulan');
            const tahun = $(this).data('tahun');
            // Set data to Form Edit
            $('.id').val(id);
            $('.jumlah_penduduk').val(jumlah_penduduk);
            $('.bulan').val(bulan);
            $('.tahun').val(tahun).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.id').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
</body>
</html>