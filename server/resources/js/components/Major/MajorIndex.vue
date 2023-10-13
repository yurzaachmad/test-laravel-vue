<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Major</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in majors" :key="item.id">
                <td>{{ index + 1 }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.idMajor"
                        @input="item.idMajor = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.idMajor }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.nameMajor"
                        @input="item.nameMajor = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.nameMajor }}</td>
                <td>
                    <button
                        type="button"
                        :class="
                            item.isEdit ? 'btn btn-success' : 'btn btn-warning'
                        "
                        @click="toggleEdit(item)"
                    >
                        {{ item.isEdit ? "Save" : "Edit" }}
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { ref, onMounted } from "vue";

export default {
    setup() {
        const majors = ref([]);

        const toggleEdit = (item) => {
            item.isEdit = !item.isEdit;
        };

        onMounted(() => {
            axios
                .get("/api/majors")
                .then((response) => {
                    majors.value = response.data.data.data.map((item) => ({
                        ...item,
                        isEdit: false,
                    }));
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        });

        return {
            majors,
            toggleEdit,
        };
    },
};
</script>
