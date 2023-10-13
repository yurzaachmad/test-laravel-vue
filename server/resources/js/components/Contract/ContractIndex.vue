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
                </td>
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
        };
    },
};
</script>
