<template>

    <Head>
        <title>Pesantren • Presensi Darul Aman</title>
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h4 class="fw-bold" style="height: 42px; line-height: 42px;">Edit Data Pesantren</h4>
                        <hr>
                        <form @submit.prevent="submit" class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Nama Pesantren</label>
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan nama pesantren disini..." v-model="form.name">
                                        <div v-if="errors.name" class="alert alert-danger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Alamat Pesantren</label>
                                        <input type="text" class="form-control"
                                            placeholder="Masukkan alamat pesantren disini..." v-model="form.address">
                                        <div v-if="errors.address" class="alert alert-danger mt-2">
                                            {{ errors . address }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label>Latitude</label>
                                    <input type="text" class="form-control" placeholder="Masukkan latitude disini..."
                                        v-model="form.latitude">
                                    <div v-if="errors.latitude" class="alert alert-danger mt-2">
                                        {{ errors . latitude }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Longitude</label>
                                    <input type="text" class="form-control"
                                        placeholder="Masukkan longitude disini..." v-model="form.longitude">
                                    <div v-if="errors.longitude" class="alert alert-danger mt-2">
                                        {{ errors . longitude }}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Radius (M)</label>
                                    <input type="text" class="form-control"
                                        placeholder="Masukkan radium dalam meter disini..." v-model="form.radius_m">
                                    <div v-if="errors.radius_m" class="alert alert-danger mt-2">
                                        {{ errors . radius_m }}
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary border-0 shadow me-2">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning border-0 shadow">Reset</button>
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
        router
    } from '@inertiajs/vue3';

    import {
        reactive
    } from 'vue';

    import Swal from 'sweetalert2';


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

            const submit = () => {
                router.put(`/admin/school/${props.school.id}`, {
                    name: form.name,
                    address: form.address,
                    latitude: form.latitude,
                    longitude: form.longitude,
                    radius_m: form.radius_m,
                }, {
                    onSuccess: () => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data Pesantren Berhasil Diupdate!.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                });

            }

            return {
                form,
                submit,
            };

        }

    }
</script>

<style>

</style>
