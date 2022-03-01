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
                <h3 class="text-lg text-gray-900">Note list</h3>
                <p class="text-sm text-gray-600">
                  Take the right record and execute any function (see, edit,
                  delete)
                </p>
              </div>
            </div>
            <div class="md:col-span-2 mt-5 md:mt-0">
              <div class="shadow bg-white md:rounded-md p-4">
                <div class="flex justify-between">
                  <input
                    type="text"
                    class="form-input rounded-md shadow-md"
                    placeholder="Search..."
                    v-model="q"
                  />

                  <Link
                    :href="route('notes.create')"
                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md"
                  >
                    Create a new Note
                  </Link>
                </div>

                <hr class="my-6" />

                <table class="w-full">
                  <tr v-for="note in notes" :key="note.excerpt">
                    <td class="border px-4 py-2">
                      {{ note.excerpt }}
                    </td>
                    <td class="px-4 py-2">
                      <Link
                        :href="route('notes.show', note)"
                        class="bg-green-500 hover:bg-green-700 text-white px-2 py-1 rounded-md"
                      >
                        See
                      </Link>
                    </td>
                    <td class="px-4 py-2">
                      <Link
                        :href="route('notes.edit', note)"
                        class="bg-orange-500 hover:bg-orange-700 text-white px-2 py-1 rounded-md"
                      >
                        Edit
                      </Link>
                    </td>
                  </tr>
                </table>
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
    notes: Array,
  },
  data() {
    return {
      q: '',
    };
  },
  watch: {
    q: function (value) {
      this.$inertia.get(
        this.route('notes.index', { q: value }),
        {},
        { preserveState: true },
      );
    },
  },
});
</script>
