<template>

    <Head>
        <title>Riwayat Presensi • Presensi Darul Aman</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </Head>
    <div class="container-fluid mb-4 mt-4">
        <div class="row">
            <div class="com-md-12">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <h4 class="fw-bold mb-0">Riwayat Presensi</h4>
                            <div class="d-flex align-items-center gap-3">
                                <form @submit.prevent="handleSearch" class="flex-shrink-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-1" v-model="search"
                                            placeholder="Cari sesuatu...">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr class="border-0">
                                        <th class="border-0 rounded-start" style="width:2%">No</th>
                                        <th class="border-0">Nama</th>
                                        <th class="border-0">Jenis Presensi</th>
                                        <th class="border-0">Waktu Presensi</th>
                                        <th class="border-0 rounded-end">Latitude-Longitude</th>
                                    </tr>
                                </thead>
                                <div class="mt-2"></div>
                                <tbody>
                                    <tr v-for="(attendance, index) in attendances.data" :key="index">
                                        <td class="fw-bold text-center">
                                            {{ ++index + (attendances . current_page - 1) * attendances . per_page }}</td>
                                        <td>{{ attendance . student . name }}</td>
                                        <td>{{ attendance . attendance_type . name }}</td>
                                        <td>{{ attendance . date_time }}</td>
                                        <td>{{ attendance . latlon }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <Pagination :links="attendances.links" align="end" />
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

    export default {
        layout: LayoutAdmin,

        components: {
            Head,
            Link,
            Pagination
        },

        props: {
            attendances: Object,
        },

        setup() {
            const search = ref('' || (new URL(document.location)).searchParams.get('q'));

            const handleSearch = () => {
                router.get('/admin/attendances', {
                    q: search.value,
                });
            }

            return {
                search,
                handleSearch,
            }

        }
    }
</script>

<style>

</style>
