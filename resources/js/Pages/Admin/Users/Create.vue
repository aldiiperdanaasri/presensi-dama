<template>

    <Head>
        <title>Tambah Pembina • Presensi Darul Aman</title>
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h4 class="fw-bold" style="height: 42px; line-height: 42px;">Tambah Pembina</h4>
                        <hr>
                        <form @submit.prevent="submit" class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama pembina disini..."
                                            v-model="form.name">
                                        <div v-if="errors.name" class="alert alert-danger mt-2">
                                            {{ errors . name }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Masukkan Email Petani"
                                            v-model="form.email">
                                        <div v-if="errors.email" class="alert alert-danger mt-2">
                                            {{ errors . email }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Kata Sandi</label>
                                        <input type="password" class="form-control" placeholder="Masukkan Kata Sandi"
                                            v-model="form.password">
                                        <div v-if="errors.password" class="alert alert-danger mt-2">
                                            {{ errors . password }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label>Konfirmasi Kata Sandi</label>
                                        <input type="password" class="form-control"
                                            placeholder="Masukkan Konfirmasi Kata Sandi"
                                            v-model="form.password_confirmation">
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
        },

        setup() {
            const form = reactive({
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            });

            const submit = () => {
                router.post('/admin/users', {
                    name: form.name,
                    email: form.email,
                    password: form.password,
                    password_confirmation: form.password_confirmation
                }, {
                    onSuccess: () => {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Pembina Berhasil Ditambah',
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
