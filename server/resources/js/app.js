/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import { createApp } from "vue/dist/vue.esm-bundler";

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});
import ExampleComponent from "./components/ExampleComponent.vue";
import UserIndex from "./components/User/UserIndex.vue";
import MajorIndex from "./components/Major/MajorIndex.vue";
import AddMajor from "./components/Major/AddMajor.vue";
import AddDosen from "./components/Dosen/AddDosen.vue";
import StudyIndex from "./components/Study/StudyIndex.vue";
import AddStudy from "./components/Study/AddStudy.vue";
import DosenIndex from "./components/Dosen/DosenIndex.vue";
import ContractIndex from "./components/Contract/ContractIndex.vue";
import AddContract from "./components/Contract/AddContract.vue";
app.component("user-index", UserIndex);
app.component("major-index", MajorIndex);
app.component("study-index", StudyIndex);
app.component("dosen-index", DosenIndex);
app.component("add-dosen", AddDosen);
app.component("contract-index", ContractIndex);
app.component("add-study", AddStudy);
app.component("add-contract", AddContract);
app.component("add-major", AddMajor);
app.component("example-component", ExampleComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount("#app");
