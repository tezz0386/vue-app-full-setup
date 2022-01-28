<template>
  <div class="wrapper">
    <admin-header />
    <sidebar />
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
                      <label for="name">Choose Logo:</label>
                      <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control form-control-sm"
                         @change="onFileChange"
                      />
                      <img v-bind:src="imagePreview" width="100%" height="250" v-show="showPreview"/> 
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
                      <label for="name">Button Text:</label>
                      <input
                        type="text"
                        name="btn_text"
                        id="btn_text"
                        v-model="this.banner.btn_text"
                        class="form-control form-control-sm"
                      />
                    </div>
                    <div class="form-group">
                      <label for="name">Content:</label>
                      <textarea name="content" id="content"  rows="5" class="form-control" v-model="this.bann"></textarea>
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
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="status">Status:</label>
                      <select name="status" id="status" v-model="this.banner.status">
                          <option value="active">Active</option>
                          <option value="inactive">Inactive</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <button class="btn btn-primary" v-on:click="addBanner">Save</button>
                  </div>
              </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import AdminHeader from "../shared/AdminHeader.vue";
import Breadcrumb from "../shared/Breadcrumb.vue";
import Sidebar from "../shared/Sidebar.vue";
export default {
  components: { AdminHeader, Sidebar, Breadcrumb},
  data:{
      return:{
          banner:{},
      }
  },
  created(){
      this.$axios.get('/snactum/csrf-cookie').then(response=>{
          this.$axios.get('/admin/banner/'+this.$route.id)
            .then(response=>{
                this.banner = response.data.banner;
            })
            .catch(error=>{
                console.log(error);
            })
      });
  },
  beforeRouteEnter(ro, from, next){
      if(!window.Laravel.isLoggedin){
        window.location.href = "/";
      }
      if(window.Laravel.user.role == 'user'){
          window.location.href = "/user/home";
      }
      next();
  },
  methods:{
      updateBanner(){
          alert();
      },
  }
};
</script>