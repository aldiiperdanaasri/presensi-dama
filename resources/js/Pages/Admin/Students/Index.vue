<template>

    <Head>
        <title>Santri • Presensi Darul Aman</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="com-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <h4 class="fw-bold mb-0">Daftar Santri</h4>
                            <div class="d-flex align-items-center gap-3">
                                <form @submit.prevent="handleSearch" class="flex-shrink-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-1" v-model="search"
                                            placeholder="Cari sesuatu...">
                                    </div>
                                </form>
                                <Link href="/admin/students/create" class="btn btn-md btn-primary border-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                    fill="currentColor" class="bi bi-plus-lg icon icon-xs" viewBox="16 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                </svg>
                                Tambah
                                </Link>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0">
                                        <th class="border-0 rounded-start" style="width:2%">No</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Kelas</th>
                                        <th class="border-0 rounded-end" style="width:10%">Aksi</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(student, index) in students.data" :key="index">
                                    <td class="fw-bold text-center align-middle">
                                        {{ ++index + (students.current_page - 1) * students.per_page }}
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <img :src="`/storage/images/${student.image_url}`" class="rounded-circle me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                        {{ student.name }}
                                    </td>
                                    <td class="align-middle">{{ student.class }}</td>
                                    <td class="align-middle">
                                        <Link :href="`/admin/students/${student.id}/edit`"
                                            class="btn btn-sm btn-info border-0 me-2" type="button"><i class="fa fa-pencil-alt"></i></Link>
                                        <button @click.prevent="destroy(student.id)"
                                            class="btn btn-sm btn-danger border-0"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="students.links" align="end" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import LayoutAdmin from '../../../Layouts/Admin.vue';
    import Pagination from '../../../Components/Pagination.vue';
    import {
        Head,
        Link,
        router
    } from '@inertiajs/vue3';
    import {
        ref
    } from 'vue';
    import Swal from 'sweetalert2';

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
            Pagination
        },

        props: {
            students: Object,
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/admin/students', {
                    q: search.value,
                });
            }

            const destroy = (id) => {
                Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Hapus',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Batal'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            router.delete(`/admin/students/${id}`);
                            Swal.fire({
                                title: 'Dihapus!',
                                text: 'Data Santri Berhasil Dihapus!',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        }
                    })
            }

            return {
                search,
                handleSearch,
                destroy,
            }

        }
    }
</script>

<style>

</style>
