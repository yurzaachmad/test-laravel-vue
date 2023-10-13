<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Study</th>
                <th scope="col">SKS</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in studies" :key="item.id">
                <td>{{ index + 1 }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.idStudy"
                        @input="item.idStudy = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.idStudy }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.nameStudy"
                        @input="item.nameStudy = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.nameStudy }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.sks"
                        @input="item.sks = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.sks }}</td>
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
        const studies = ref([]);

        const toggleEdit = (item) => {
            item.isEdit = !item.isEdit;
        };

        onMounted(() => {
            axios
                .get("/api/studies")
                .then((response) => {
                    studies.value = response.data.data.data.map((item) => ({
                        ...item,
                        isEdit: false,
                    }));
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        });

        return {
            studies,
            toggleEdit,
        };
    },
};
</script>
