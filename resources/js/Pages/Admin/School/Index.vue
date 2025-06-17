<template>

    <Head>
        <title>Pesantren • Presensi Darul Aman</title>
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <h4 class="fw-bold mb-0">Data Pesantren</h4>
                            <div class="d-flex align-items-center">
                                <Link href="/admin/school/1/edit" class="btn btn-md btn-primary border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" class="bi bi-pencil-fill icon icon-xs" viewBox="16 16 16">
                                    <path
                                        d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                </svg>
                                Edit
                                </Link>
                            </div>
                        </div>
                        <hr>
                        <form @submit.prevent="submit" class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Nama Pesantren</label>
                                        <input type="text" class="form-control" v-model="form.name" readonly
                                            style="pointer-events: none; background-color: white;">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Alamat Pesantren</label>
                                        <input type="text" class="form-control" v-model="form.address" readonly
                                            style="pointer-events: none; background-color: white;">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md-4">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" v-model="form.latitude" readonly
                                        style="pointer-events: none; background-color: white;">
                                </div>
                                <div class="col-md-4">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control" v-model="form.longitude" readonly
                                        style="pointer-events: none; background-color: white;">
                                </div>
                                <div class="col-md-4">
                                    <label>Radius (M)</label>
                                    <input type="text" class="form-control" v-model="form.radius_m" readonly
                                        style="pointer-events: none; background-color: white;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutAdmin from '../../../Layouts/Admin.vue';

    import {
        Head,
        Link,
    } from '@inertiajs/vue3';

    import {
        reactive
    } from 'vue';

    export default {

        layout: LayoutAdmin,

        components: {
            Head,
            Link
        },

        props: {
            errors: Object,
            school: Object
        },

        setup(props) {

            const form = reactive({
                name: props.school.name,
                address: props.school.address,
                latitude: props.school.latitude,
                longitude: props.school.longitude,
                radius_m: props.school.radius_m,
            });

            return {
                form
            };

        }

    }
</script>

<style>

</style>
