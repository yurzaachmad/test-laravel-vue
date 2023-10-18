<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Result</th>
                <th scope="col">Note</th>
                <th scope="col">NIP</th>
                <th scope="col">ID Study</th>
                <th scope="col">NIM</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in contracts" :key="item.id">
                <td v-if="item.isEdit">
                    <input
                        :value="item.idContract"
                        @input="item.idContract = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.idContract }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.result"
                        @input="item.result = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.result }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.passed"
                        @input="item.passed = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.passed ? "Passed" : "Repeat" }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.nip"
                        @input="item.nip = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.nip }}</td>
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
                        :value="item.nim"
                        @input="item.nim = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.nim }}</td>
                <td v-if="item.isEdit">
                    <input
                        :value="item.date"
                        @input="item.date = $event.target.value"
                        style="width: 60%"
                    />
                </td>
                <td v-else>{{ item.date }}</td>
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
                    &nbsp;
                    <button
                        type="button"
                        class="btn btn-danger"
                        @click="showConfirmDialog(item)"
                    >
                        Delete
                    </button>
                </td>
                <div v-if="item.isDelete" class="confirm-dialog">
                    <p>Are you sure you want to remove this?</p>
                    <button @click="removeContract(item.id)">Yes</button>
                    <button @click="showConfirmDialog(item)">No</button>
                </div>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { ref, onMounted } from "vue";

export default {
    setup() {
        const contracts = ref([]);

        const toggleEdit = (item) => {
            item.isEdit = !item.isEdit;
        };

        const showConfirmDialog = (item) => {
            item.isDelete = !item.isDelete;
        };

        async function removeContract(id) {
            await axios
                .delete(`/api/contracts/${id}`)
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
                .get("/api/contracts")
                .then((response) => {
                    contracts.value = response.data.data.data.map((item) => ({
                        ...item,
                        isEdit: false,
                    }));
                })
                .catch((error) => {
                    console.log("Error", error);
                });
        });

        return {
            contracts,
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
