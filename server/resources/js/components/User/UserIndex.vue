<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">NIM</th>
                <th scope="col">Major</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(user, index) in users" :key="user.id">
                <td>{{ index + 1 }}</td>
                <td v-if="user.isEdit">
                    <input
                        :value="user.name"
                        @input="user.name = $event.target.value"
                        style="width: 80%"
                    />
                </td>
                <td v-else>{{ user.name }}</td>
                <td v-if="user.isEdit">
                    <input
                        :value="user.email"
                        @input="user.email = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ user.email }}</td>
                <td v-if="user.isEdit">
                    <input
                        :value="user.nim"
                        @input="user.nim = $event.target.value"
                        style="width: 80%"
                    />
                </td>
                <td v-else>{{ user.nim }}</td>
                <td v-if="user.isEdit">
                    <input
                        :value="user.idMajor"
                        @input="user.idMajor = $event.target.value"
                        style="width: 80%"
                    />
                </td>
                <td v-else>{{ user.idMajor }}</td>
                <td>
                    <button
                        type="button"
                        :class="
                            user.isEdit ? 'btn btn-success' : 'btn btn-warning'
                        "
                        @click="toggleEdit(user)"
                    >
                        {{ user.isEdit ? "Save" : "Edit" }}
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
        const users = ref([]);

        const toggleEdit = (item) => {
            item.isEdit = !item.isEdit;
        };

        onMounted(() => {
            axios
                .get("/api/users")
                .then((response) => {
                    users.value = response.data.data.data.map((item) => ({
                        ...item,
                        isEdit: false,
                    }));
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        });

        return {
            users,
            toggleEdit,
        };
    },
};
</script>
