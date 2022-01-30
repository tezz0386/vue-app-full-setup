<template>
  <div class="wrapper">
    <admin-header />

    <sidebar
      :activePage="this.activePage"
      :page="this.page"
      :name="this.name"
    />
    <div class="content-wrapper">
      <breadcrumb />

      <section class="content">
        <div class="container-fluid">
          <!-- <form action=""> -->
          <div class="row">
            <div class="col-md-8">
              <div
                class="card card-default"
                style="border-top: 3px solid #3c8dbc !important"
              >
                <div class="card-header">
                  <h3 class="card-title">Details</h3>
                  <div class="card-tools">
                    <button
                      type="button"
                      class="btn btn-tool"
                      data-card-widget="collapse"
                    >
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block">
                  <div class="form-group">
                    <label for="name">Title:</label>
                    <input
                      type="text"
                      name="title"
                      id="title"
                      v-model="this.banner.title"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Choose Image:</label>
                    <input
                      type="file"
                      name="image"
                      id="image"
                      class="form-control form-control-sm"
                      @change="onFileChange"
                    />
                    <img
                      v-bind:src="imagePreview"
                      width="300"
                      height="250"
                      v-show="showPreview"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">URL:</label>
                    <input
                      type="text"
                      name="url"
                      id="url"
                      v-model="this.banner.url"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Content:</label>
                    <textarea
                      name="content"
                      id="content"
                      rows="3"
                      v-model="this.banner.content"
                      class="form-control"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Button Text:</label>
                    <input
                      type="text"
                      name="btn_text"
                      id="btn_text"
                      v-model="this.banner.btn_text"
                      class="form-control form-control-sm"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div
                class="card card-default"
                style="border-top: 3px solid #3c8dbc !important"
              >
                <div class="card-header">
                  <h3 class="card-title">Action</h3>
                  <div class="card-tools">
                    <button
                      type="button"
                      class="btn btn-tool"
                      data-card-widget="collapse"
                    >
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: block">
                  <div class="form-group">
                    <label for="status">Status::</label>
                    <select
                      name="status"
                      id="status"
                      v-model="this.banner.status"
                      class="form-control form-control-sm"
                    >
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button
                      class="btn btn-primary"
                      v-on:click="updateBanner"
                      type="button"
                    >
                      Save
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- </form> -->
        </div>
      </section>
    </div>
    <footer />
  </div>
</template>
<script>
import AdminHeader from "../shared/AdminHeader.vue";
import Breadcrumb from "../shared/Breadcrumb.vue";
import Footer from "../shared/Footer.vue";
import Sidebar from "../shared/Sidebar.vue";

export default {
  components: { AdminHeader, Sidebar, Breadcrumb, Footer },
  name: "BannerEdit",
  data() {
    return {
      banner: {},
      name: null,
      activePage: "banner_create",
      page: "banner",
      imagePreview: null,
      showPreview: false,
    };
  },
  created() {
    this.$Progress.start();
    if (window.Laravel.user) {
      this.name = window.Laravel.user.name;
    }
    this.$axios.get('/snactum/csrf-cookie').then((response)=>{
      this.$axios.get(window.Laravel.base_url+'admin/banner/'+this.$route.params.id).then((response)=>{
        console.log(response.data.message);
        this.banner=response.data.banner;
        this.$Progress.finish();
        this.showPreview = true;
        this.imagePreview = '/uploads/banners/thumbnail/'+this.banner.image;
      })
      .catch((error)=>{
        console.log(error);
      })
      .finally(()=>{
        this.load=false;
      });
    });
  },
  beforeRouteEnter(to, from, next) {
    if (!window.Laravel.isLoggedin) {
      window.location.href = "/";
    }
    if (window.Laravel.user.role == "user") {
      window.location.href = "/user/home";
    }
    next();
  },
  methods: {
    onFileChange(event) {
      /*
    Set the local file variable to what the user has selected.
    */
      // this.formData.picture = event.target.files[0];
      this.banner.image = event.target.files[0];
      /*
    Initialize a File Reader object
    */
      let reader = new FileReader();

      /*
    Add an event listener to the reader that when the file
    has been loaded, we flag the show preview as true and set the
    image to be what was read from the reader.
    */
      reader.addEventListener(
        "load",
        function () {
          this.showPreview = true;
          this.imagePreview = reader.result;
        }.bind(this),
        false
      );

      /*
    Check to see if the file is not empty.
    */
      if (this.banner.image) {
        /*
            Ensure the file is an image file.
        */
        if (/\.(jpe?g|png|gif)$/i.test(this.banner.image.name)) {
          console.log("here");
          /*
            Fire the readAsDataURL method which will read the file in and
            upon completion fire a 'load' event which we will listen to and
            display the image in the preview.
            */
          reader.readAsDataURL(this.banner.image);
        }
      }
    },
    updateBanner() {
      this.$Progress.start()
      let formData = new FormData();
      formData.append('title', this.banner.title);
      formData.append('url', this.banner.url);
      formData.append('content', this.banner.content);
      formData.append('btn_text', this.banner.btn_text);
      formData.append("image", this.banner.image);
      formData.append('status', this.banner.status);
      formData.append("_method", "PATCH");
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post(
            window.Laravel.base_url+"admin/banner/"+this.banner.id,
            formData
          )
          .then((response) => {
            this.banner = response.data.banner;
            console.log(response);
            this.$Progress.finish()
            this.$router.replace('/admin/banner');
          })
          .catch(function (error) {
            console.error(error);
          });
      });
    },
  },
};
</script>
