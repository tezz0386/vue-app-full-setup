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
          <div class="row">
              <table class="table">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Thumb</th>
                          <th>Created At</th>
                          <th>Status</th>
                          <th colspan="2">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="(banner, index) in this.banners" :key="index">
                          <td>{{index}}</td>
                          <td>
                              {{banner.title}}
                          </td>
                          <td>
                              <img v-bind:src="'/uploads/banners/thumbnail/'+banner.image" alt="thumb" height="100" width="150">
                          </td>
                          <td>
                              {{banner.created_at}}
                          </td>
                          <td>{{banner.status}}</td>
                          <td>
                            <router-link :to="{name: 'banner-edit', params: {id:banner.id}}">
                              <i class="fa fa-edit"></i>
                            </router-link>
                            <i class="fa fa-trash"></i>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
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
  name: "BannerList",
  data() {
    return {
      banners: {},
      name: null,
      activePage: "banner_list",
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
        this.$axios.get(window.Laravel.base_url+'admin/banner').then((response)=>{
            this.banners = response.data.banners;
            console.log(response.data.message);
            this.$Progress.finish();
        })
        .catch((error)=>{
            console.log(error);
        })
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

  },
};
</script>
