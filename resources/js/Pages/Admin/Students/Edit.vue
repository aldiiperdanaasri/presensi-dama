<template>

    <Head>
        <title>Edit Pengguna • Presensi Darul Aman</title>
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <h4 class="fw-bold" style="height: 42px; line-height: 42px;">Edit Pengguna</h4>
                        <hr>
                        <form @submit.prevent="submit" class="mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nama santri disini..."
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
                                        <label>Kelas</label>
                                        <select class="form-select form-control" v-model="form.class">
                                            <option disabled value="">Pilih kelas santri disini...</option>
                                            <option value="VII">VII</option>
                                            <option value="VIII">VIII</option>
                                            <option value="IX">IX</option>
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                        <div v-if="errors.class" class="alert alert-danger mt-2">
                                            {{ errors . class }}
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
            student: Object
        },

        setup(props) {

            const form = reactive({
                name: props.student.name,
                class: props.student.class,
            });

            const submit = () => {

                router.put(`/admin/students/${props.student.id}`, {
                    name: form.name,
                    class: form.class,
                }, {
                    onSuccess: () => {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Data Santri Berhasil Diupdate!.',
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
