<template>
  <div class="wrapper">
    <admin-header />

    <sidebar :activePage="this.activePage" :name="this.name" />

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
                    <label for="name">App Name:</label>
                    <input
                      type="text"
                      name="name"
                      id="name"
                      v-model="this.setting.name"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Choose Logo:</label>
                    <input
                      type="file"
                      name="logo"
                      id="logo"
                      class="form-control form-control-sm"
                      @change="onFileChange"
                    />
                    <img
                      v-bind:src="imagePreview"
                      width="100"
                      height="100"
                      v-show="showPreview"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Primary Email:</label>
                    <input
                      type="email"
                      name="p_email"
                      id="p_email"
                      v-model="this.setting.p_email"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Secondary Email:</label>
                    <input
                      type="email"
                      name="s_email"
                      id="s_email"
                      v-model="this.setting.s_email"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Mobile No:</label>
                    <input
                      type="number"
                      name="m_no"
                      id="m_no"
                      v-model="this.setting.m_no"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Telephone No:</label>
                    <input
                      type="text"
                      name="t_no"
                      id="t_no"
                      v-model="this.setting.t_no"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Location:</label>
                    <input
                      type="text"
                      name="location"
                      id="location"
                      v-model="this.setting.location"
                      class="form-control form-control-sm"
                    />
                  </div>
                </div>
              </div>
              <div
                class="card card-default collapsed-card"
                style="border-top: 3px solid #3c8dbc !important"
              >
                <div class="card-header">
                  <h3 class="card-title">Social Links</h3>
                  <div class="card-tools">
                    <button
                      type="button"
                      class="btn btn-tool"
                      data-card-widget="collapse"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: none">
                  <div class="form-group">
                    <label for="name">Facebook Link:</label>
                    <input
                      type="text"
                      name="facebook_link"
                      id="facebook_link"
                      v-model="this.setting.facebook_link"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Twitter Link:</label>
                    <input
                      type="text"
                      name="twitter_link"
                      id="twitter_link"
                      v-model="this.setting.twitter_link"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Insatgram Link:</label>
                    <input
                      type="text"
                      name="instagram_link"
                      id="instagram_link"
                      v-model="this.setting.instagram_link"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Linkedin Link:</label>
                    <input
                      type="text"
                      name="linkedin_link"
                      id="linkedin_link"
                      v-model="this.setting.linkedin_link"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Google Link:</label>
                    <input
                      type="text"
                      name="google_link"
                      id="google_link"
                      v-model="this.setting.google_link"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Whats App No:</label>
                    <input
                      type="number"
                      name="whatsap_no"
                      id="whatsap_no"
                      v-model="this.setting.whatsap_no"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Vibee App No:</label>
                    <input
                      type="number"
                      name="viber_no"
                      id="viber_no"
                      v-model="this.setting.viber_no"
                      class="form-control form-control-sm"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div
                class="card card-default collapsed-card"
                style="border-top: 3px solid #3c8dbc !important"
              >
                <div class="card-header">
                  <h3 class="card-title">SEO</h3>
                  <div class="card-tools">
                    <button
                      type="button"
                      class="btn btn-tool"
                      data-card-widget="collapse"
                    >
                      <i class="fas fa-plus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body" style="display: none">
                  <div class="form-group">
                    <label for="name">Title:</label>
                    <input
                      type="text"
                      name="title_tag"
                      id="title_tag"
                      v-model="this.setting.title_tag"
                      class="form-control form-control-sm"
                    />
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Keywords:</label>
                    <textarea
                      name="meta_keywords"
                      id="meta_keywords"
                      v-model="this.setting.meta_keywords"
                      class="form-control"
                      rows="3"
                    ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Meta Description:</label>
                    <textarea
                      name="meta_description"
                      id="meta_description"
                      v-model="this.setting.meta_description"
                      class="form-control"
                      rows="4"
                    ></textarea>
                  </div>
                </div>
              </div>
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
                    <button
                      class="btn btn-primary"
                      v-on:click="addSetting"
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
  name: "AdminDashboard",
  data() {
    return {
      setting: {},
      name: null,
      activePage: "setting",
      imagePreview: null,
      showPreview: false,
    };
  },
  created() {
    this.$Progress.start();
    if (window.Laravel.user) {
      this.name = window.Laravel.user.name;
    }
    this.$axios.get("/sanctum/csrf-cookie").then((response) => {
      this.$axios
        .get("/api/v1/admin/setting")
        .then((response) => {
          this.setting = response.data.setting;
          if (!this.setting.logo == "") {
            this.imagePreview =
              "/uploads/settings/thumbnail/" + this.setting.logo;
            this.showPreview = true;
          }
          this.$Progress.finish();
        })
        .catch(function (error) {
          console.error(error);
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
      this.setting.logo = event.target.files[0];
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
      if (this.setting.logo) {
        /*
            Ensure the file is an image file.
        */
        if (/\.(jpe?g|png|gif)$/i.test(this.setting.logo.name)) {
          console.log("here");
          /*
            Fire the readAsDataURL method which will read the file in and
            upon completion fire a 'load' event which we will listen to and
            display the image in the preview.
            */
          reader.readAsDataURL(this.setting.logo);
        }
      }
    },
    addSetting() {
      let formData = new FormData();
      formData.append("name", this.setting.name);
      formData.append("logo", this.setting.logo);
      formData.append("p_email", this.setting.p_email);
      formData.append("s_email", this.setting.s_email);
      formData.append("m_no", this.setting.m_no);
      formData.append("t_no", this.setting.t_no);
      formData.append("facebook_link", this.setting.facebook_link);
      formData.append("twitter_link", this.setting.twitter_link);
      formData.append("instagram_link", this.setting.instagram_link);
      formData.append("google_link", this.setting.google_link);
      formData.append("whatsapp_no", this.setting.whatsapp_no);
      formData.append("viber_no", this.setting.viber_no);
      formData.append("title_tag", this.setting.title_tag);
      formData.append("meta_keywords", this.setting.meta_keywords);
      formData.append("meta_description", this.setting.meta_description);
      formData.append("_method", "PATCH");
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post(
            window.Laravel.base_url+"admin/setting/" + this.setting.id,
            formData
          )
          .then((response) => {
            this.setting = response.data.setting;
            console.log(response);
            this.$toast.success("Successfully Updated");
          })
          .catch(function (error) {
            console.error(error);
            this.$toast.error("Could not be Updated");
          });
      });
    },
  },
};
</script>