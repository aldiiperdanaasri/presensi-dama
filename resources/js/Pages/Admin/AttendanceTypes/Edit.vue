E<template>

    <Head>
        <title>Edit Jenis Presensi • Presensi Darul Aman</title>
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h4 class="fw-bold" style="height: 42px; line-height: 42px;">Edit Jenis Presensi</h4>
                        <hr>
                        <form @submit.prevent="submit" class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Nama Presensi</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama presensi disini..."
                                            v-model="form.name">
                                        <div v-if="errors.name" class="alert alert-danger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Waktu Mulai</label>
                                        <input type="time" class="form-control" placeholder="Masukkan waktu mulai disini..."
                                            v-model="form.time_in">
                                        <div v-if="errors.time_in" class="alert alert-danger mt-2">
                                            {{ errors . time_in }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Waktu Selesai</label>
                                        <input type="time" class="form-control" placeholder="Masukkan waktu selesai disini..."
                                            v-model="form.time_out">
                                        <div v-if="errors.time_out" class="alert alert-danger mt-2">
                                            {{ errors . time_out }}
                                        </div>
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
            attendance_type: Object,
        },

        setup(props) {
            
            const form = reactive({
                name: props.attendance_type.name,
                time_in: props.attendance_type.time_in,
                time_out: props.attendance_type.time_out
            });

            const submit = () => {

                router.put(`/admin/attendance_types/${props.attendance_type.id}`, {
                    name: form.name,
                    time_in: form.time_in,
                    time_out: form.time_out
                }, {
                    onSuccess: () => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data Jenis Presensi Berhasil Diupdate!.',
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
