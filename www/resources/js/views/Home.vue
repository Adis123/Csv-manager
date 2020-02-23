<template>

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <router-link :to="{path: '/'}"
                         class="sidebar-brand d-flex align-items-center justify-content-center">

                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CSV <sup>Manager</sup></div>
            </router-link>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <dropzone class="nav-link" ref="myVueDropzone"
                          id="dropzone"
                          typeof="link"
                          v-on:vdropzone-success="viewUploadedFile"
                          :options="uploadOptions"
                          :useCustomSlot="true">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Upload</span></dropzone>

            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                CSV files
            </div>

            <ul style="overflow:scroll; padding-inline-start:0px;">
                <li v-for="item in items" class="nav-item row">
                    <router-link :to="{name: 'view', params: {id: item.id, name:item.name}}"
                                 class="nav-link col-sm-9">
                        <i class="fas fa-fw fa-table"></i>
                        {{ item.name }}
                    </router-link>
                    <a v-on:click="deleteImport(item.id, item.name)"
                       class="fa fa-fw fa-trash-alt nav-link col-sm-2"></a>


                </li>
            </ul>

        </ul>

        <router-view :key="$route.fullPath"></router-view>

    </div>

</template>

<script>
    import dropzone from 'vue2-dropzone';
    import axios from 'axios';
    import Viewcsv from '../views/View.vue';


    export default {
        name: "Home",
        components: {
            dropzone,
            Viewcsv: Viewcsv.Viewcsv
        },
        data() {
            return {
                loading: {},
                items: {},
                uploadOptions: {
                    url: '/api/upload',
                    maxFilesize: 100,
                    addRemoveLinks: true,
                    removeFile: true,
                }
            }
        },
        beforeMount() {
            let loader = this.$loading.show();
            axios.get('/api/import/list/get').then(response => {
                this.items = response.data;
                loader.hide();
            });
        },
        methods: {
            deleteImport(id, name) {
                if (confirm("Are you sure to delete " + name + " ?") === true) {
                    let loader = this.$loading.show();
                    axios.get('/api/import/delete/' + id).then(response => {
                    }).then(() => {
                        //After deleting the page updates
                        axios.get('/api/import/list/get').then(response => {
                            this.items = response.data;
                            loader.hide();
                        });

                    });
                    //the page redirects to home if table which you were on gets deleted
                    if (id === this.$route.params.id) {
                        this.$router.push({name: 'Home'})
                    }

                }
            },
            viewUploadedFile(file, response) {
                this.$router.push({name: 'view', params: {id: response.id, name: response.name}})
            },
        },
    }
</script>

<style scoped>

</style>
