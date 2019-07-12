<template>
  <div>
    <!-- Dynamic Navbar -->
    <navbar></navbar>
    <!-- Actual Content-->
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">All Users</div>
                  <div class="card-tools">
                    <button class="btn btn-success" data-toggle="modal" data-target="#addNew">
                      Add New
                      <i class="fas fa-user-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Modify</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="user in users" :key="user.id">
                        <td>{{user.id}}</td>
                        <td>{{user.name}}</td>
                        <td>{{user.email}}</td>
                        <td>{{user.type}}</td>
                        <td>
                          <a href="#">
                            <i class="fa fa-edit"></i>
                          </a> |
                          <a href="#">
                            <i class="fa fa-trash red"></i>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div
            class="modal fade"
            id="addNew"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form @submit.prevent="createUser">
                  <div class="modal-body">
                    <!-- Input Name -->
                    <div class="form-group">
                      <input
                        v-model="user.name"
                        type="text"
                        name="name"
                        placeholder="Name"
                        class="form-control"
                      >
                    </div>

                    <!-- Input email -->
                    <div class="form-group">
                      <input
                        v-model="user.email"
                        type="email"
                        name="email"
                        placeholder="Enter Email Address"
                        class="form-control"
                      >
                    </div>

                    <!-- Input password -->
                    <div class="form-group">
                      <input
                        v-model="user.password"
                        type="password"
                        name="password"
                        placeholder="Enter Password"
                        class="form-control"
                      >
                    </div>

                    <!-- Select Role -->
                    <div class="form-group">
                      <select
                        v-model="user.type"
                        name="type"
                        class="form-control"
                      >
                        <option value="Facility Administrator">Facility Administrator</option>
                        <option value="Blood Collection Unit">Blood Collection Unit</option>
                        <option value="Medical Technologist">Medical Technologist</option>
                        <option value="Blood Releasing Unit">Blood Releasing Unit</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      users: {},
      user:{
        name: "",
        email: "",
        password: "",
        type: ""
      } 
    };
  },
  methods: {
    loadUsers() {
      axios.get("/api/user").then(({ data }) => (this.users = data.data));
    },
    createUser() {
      this.user
        .post("/api/user")
        .then(() => {
          this.$Progress.start();
          console.log("posting");
          Fire.$emit("AfterUserCreated");
          console.log("posted");
          $("#addNew").modal("hide");
          toast.fire({
            type: "success",
            title: "User created successfully"
          });
          this.$Progress.finish();
        })
        .catch(() => {
          console.log("naku");
        });
    }
  },
  created() {
    this.loadUsers();
    Fire.$on("AfterUserCreated", () => {
      this.loadUsers();
    });
  }
};
</script>
