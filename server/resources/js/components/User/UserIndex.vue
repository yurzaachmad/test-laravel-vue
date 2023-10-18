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
                    &nbsp;
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="showConfirmDialog(user)"
                    >
                        Delete
                    </button>
                </td>
                <div v-if="user.isDelete" class="confirm-dialog">
                    <p>Are you sure you want to remove this?</p>
                    <button @click="removeContract(user.id)">Yes</button>
                    <button @click="showConfirmDialog(user)">No</button>
                </div>
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
        const showConfirmDialog = (item) => {
            item.isDelete = !item.isDelete;
        };

        async function removeContract(id) {
            await axios
                .delete(`/api/users/${id}`)
                .then((response) => {
                    location.reload();
                })
                .catch((error) => {
                    console.log("Error", error.response.data.message);
                    swal(error.response.data.message);
                });
        }

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
            showConfirmDialog,
            removeContract,
        };
    },
};
</script>
<style scoped>
.confirm-dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    z-index: 999;
}

.confirm-dialog p {
    margin-bottom: 20px;
}

.confirm-dialog button {
    margin: 0 10px;
    padding: 10px 20px;
    background-color: #ff0000;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.confirm-dialog button:hover {
    background-color: #ffee00;
}
</style>
