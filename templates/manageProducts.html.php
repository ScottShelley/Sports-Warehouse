<div id="app">
    <button type="button" v-if="!isAddForm" @click="isAddForm = true; clearForm()" class="btn btn-primary">Create Product</button>
    <form id="myform" action="manageProducts.php" method="post" enctype="multipart/form-data" v-if="isAddForm">
        <h2>Add Product</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" v-model="form.name" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" v-model="form.description" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" v-model="form.price" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <div class="form-group">
            <label for="salePrice">Sale Price</label>
            <input type="text" name="salePrice" id="salePrice" class="form-control" v-model="form.salePrice" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <div class="form-group">
            <label for="photoPath">Photo</label>
            <input type="file" name="photoPath" id="photoPath" class="form-control" v-model="form.photo" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="featured" v-model="form.featured">
                    Featured
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select type="text" name="categoryID" id="category" class="form-control" v-model="form.category" required>
                <option v-for="category in categories" :value="category.Id">{{ category.Name }}</option>
            </select>
            <p v-if="error" class="error">{{error}}</p>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" @click="isAddForm = false; clearForm()">Cancel</button>
    </form>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Sale price</th>
                <th>Featured</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products">
                <td>{{ product.Id }}</td>
                <td>{{ product.Name }}</td>
                <td>{{ product.CategoryName }}</td>
                <td>{{ product.Description }}</td>
                <td>{{ product.Price }}</td>
                <td>{{ product.SalePrice }}</td>
                <td v-if="product.Featured == 1">Yes</td>
                <td v-if="product.Featured == 0">No</td>
                <td><img :src="product.Photo" :alt="'Image of ' + product.Name"></td>
                <td class="float-right">
                    <button type="button" class="btn btn-info" @click="getEditForm(product)">Edit</button>
                    <button type="button" class="btn btn-info" @click="getEditPhotoForm(product)">Update Photo</button>
                    <a class="btn btn-danger" :href="'deleteProduct.php?id=' + product.Id">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>
    
    <form action="manageProducts.php" method="post" v-if="isEditForm">
        <h2>Edit Product</h2>
        <input type="hidden" name="id" v-model="form.id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"  v-model="form.name" required>  
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control" v-model="form.description" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" v-model="form.price" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <div class="form-group">
            <label for="salePrice">Sale Price</label>
            <input type="text" name="salePrice" id="salePrice" class="form-control" v-model="form.salePrice" required>
            <p v-if="error" class="error">{{error}}</p>
        </div> 
        <div class="form-group">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" name="featured" type="checkbox" v-model="form.featured">
                    Featured
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select type="text" name="categoryID" id="category" class="form-control" v-model="form.category" required>
                <option v-for="category in categories" :value="category.Id">{{ category.Name }}</option>
            </select>
            <p v-if="error" class="error">{{error}}</p>
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" @click="isEditForm = false">Cancel</button>
    </form>
    <form action="manageProducts.php" method="post" v-if="isUpdateForm" enctype="multipart/form-data">
        <input type="hidden" name="id" v-model="form.id">
        <div class="form-group">
            <label for="photoPath">Photo</label>
            <input type="file" name="photoPath" id="photoPath" class="form-control" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>
        <button type="submit" name="updatePhoto" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" @click="isUpdateForm = false">Cancel</button>
    </form>
</div>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    });

    const app = new Vue({
        el: '#app',
        data: {
            isAddForm: false,
            isEditForm: false,
            isUpdateForm: false,
            id: null,
            error: null,
            products: [],
            categories: [],
            form: {
                id: null,
                name: null,
                description: null,
                price: null,
                salePrice: null,
                photo: null,
                featured: null,
                category: null
            }
        },
        mounted() {
            axios.get("./getProducts.php")
                .then(response => {
                    this.products = response.data; 
                    console.log(this.products);
                });
            axios.get("./getCategories.php")
                .then(response => {this.categories = response.data});
        },
        methods: {
            getEditForm(model) {
                this.isAddForm = false;
                this.isEditForm = true;
                this.form.name = model.Name;
                this.form.id = model.Id;
                this.form.description = model.Description;
                this.form.price = model.Price;
                this.form.salePrice = model.SalePrice;
                this.form.photo = model.Photo;
                this.form.category = model.CategoryID;
                if (model.Featured == 1) {
                    this.form.featured = true;
                }
                else
                {
                    this.form.featured = false;
                }
            },
            getEditPhotoForm(model) {
                this.isAddForm = false;
                this.isEditForm = false;
                this.isUpdateForm = true;
                this.form.id = model.Id;
            },
            clearForm() {
                this.isEditForm = false;
                this.form.name = null;
                this.form.id = null;
                this.form.description = null;
                this.form.price = null;
                this.form.salePrice = null;
                this.form.photo = null;
            }
        }
    });
</script>