<template>

    <div class="container-fluid" style="position: relative">
        <loading :active.sync="isLoading"
                 :is-full-page="fullPage"></loading>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{this.tablename}}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="app" class="table table-bordered" ref="spreadsheet"></div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import jexcel from 'jexcel';
    import 'jexcel/dist/jexcel.css';
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';


    import axios from 'axios';
    import {from} from 'fromfrom';

    export default {
        name: 'Viewcsv',
        data() {
            return {
                filter: {
                    action: '',
                    column: '',
                    group: ''
                },
                content: {},
                isLoading: false,
                fullPage: false,
                tablename: '',
                jexceltable: {}
            }
        },
        components: {
            Loading
        },

        mounted: function () {
            this.isLoading = true;
            axios.get('/api/import/get/' + this.$route.params.id)
                .then(response => {
                    this.isLoading = false;
                    this.tablename = response.data.name;
                    return JSON.parse(response.data.content);
                }).then(content => {
                    //jexcel options
                var options = {
                    data: content,
                    allowToolbar: true,
                    defaultColWidth: 150,
                    onchange: this.onchange,
                    oninsertrow: this.onchange,
                    oninsertcolumn: this.onchange,
                    ondeleterow: this.onchange,
                    ondeletecolumn: this.onchange,
                    onmoverow: this.onchange,
                    onmovecolumn: this.onchange,
                };
                //using this instead of this.$el because we need to target specific div
                let element = document.getElementById('app');
                this.jexceltable = jexcel(element, options);
                Object.assign(this, this.jexceltable)
            })
        },
        methods: {
            onchange() {
                axios.post('/api/import/save', {
                        id: this.$route.params.id,
                        data: this.jexceltable.getData()
                    }
                )
            },

        },

    }
</script>


<style scoped>

</style>
