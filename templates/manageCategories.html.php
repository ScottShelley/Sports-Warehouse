<div id="app" class="create">
    <button type="button" v-if="!isAddForm" @click="isAddForm = true" class="btn btn-primary">Create Category</button>
    <form id="myform" action="manageCategories.php" method="post" v-if="isAddForm">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
            <p v-if="error" class="error">{{error}}</p>
        </div>  
        <button type="submit" name="add" class="btn btn-primary">Add</button>
        <button type="button" class="btn btn-secondary" @click="isAddForm = false">Cancel</button>
    </form>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="category in categories">
                <td>{{ category.Id }}</td>
                <td>{{ category.Name }}</td>
                <td class="float-right">
                    <button type="button" class="btn btn-info btn-sm" @click="getEditForm(category)">Edit</button>
                    <a class="btn btn-danger btn-sm" :href="'deleteCategory.php?id=' + category.Id">Remove</a>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="manageCategories.php" method="post" v-if="isEditForm">
        <input type="hidden" name="id" v-model="id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control"  v-model="name" required>  
        </div> 
        <button type="submit" name="edit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" @click="isEditForm = false">Cancel</button>
    </form>
</div>
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();

        $("#myform").validate({
            rules: {
                name: "required" 
            },
            messages: {
                name: "Name is required!"
            }
        });
    });

    const app = new Vue({
        el: '#app',
        data: {
            isAddForm: false,
            isEditForm: false,
            name: null,
            id: null,
            error: null,
            categories: []
        },
        mounted() {
            axios.get("./getCategories.php")
                .then(response => {this.categories = response.data});
        },
        methods: {
            getEditForm(model) {
                this.isEditForm = true;
                this.name = model.Name;
                this.id = model.Id;
            }
        }
    });
</script>