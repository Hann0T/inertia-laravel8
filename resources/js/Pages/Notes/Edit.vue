<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Notes Module
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg text-gray-900">Note edit</h3>
                <p class="text-sm text-gray-600">
                  When editing the note you cannot return to the previous state.
                </p>
              </div>
            </div>
            <div class="md:col-span-2 mt-5 md:mt-0">
              <div class="shadow bg-white md:rounded-md p-4">
                <form @submit.prevent="submit">
                  <label class="block font-medium text-sm text-gray-700"
                    >Resume</label
                  >
                  <textarea
                    class="form-input w-full rounded-md shadow-sm"
                    v-model="form.excerpt"
                  ></textarea>
                  <label class="block font-medium text-sm text-gray-700"
                    >Content</label
                  >
                  <textarea
                    class="form-input w-full rounded-md shadow-sm"
                    v-model="form.content"
                    rows="8"
                  ></textarea>
                  <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                  >
                    Edit
                  </button>

                  <Link
                    :href="route('notes.index')"
                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mx-2 rounded-md"
                  >
                    Back
                  </Link>
                </form>
                <hr class="my-6" />
                <button
                  @click="destroy"
                  class="bg-red-500 hover:bg-red-700 text-white font-bold p-2 rounded-md"
                >
                  Delete
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

export default defineComponent({
  components: {
    AppLayout,
    Link,
  },
  props: {
    note: Object,
  },
  data() {
    return {
      form: {
        excerpt: this.note.excerpt,
        content: this.note.content,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.put(this.route('notes.update', this.note), this.form);
    },
    destroy() {
      if (!confirm('Are you sure?')) return;
      this.$inertia.delete(this.route('notes.destroy', this.note));
    },
  },
});
</script>
