<template>
  <select
    :value="modelValue"
    class="block rounded-xl bg-gray-100 border-gray-100 text-sm text-tcn2nd px-3 py-2 outline-none focus:border-tcn2nd-light focus:ring focus:ring-tcn2nd-light focus:ring-opacity-50 focus:bg-white placeholder:text-gray-500 placeholder:text-xs lg:placeholder:text-sm disabled:text-gray-500 disabled:cursor-not-allowed"
    @change="changeOption($event)"
  >
    <option
      v-show="emptyOption"
      :value="''"
    >
      {{ emptyOptionName }}
    </option>

    <option
      v-for="(optionSelect, index) in optionsSelect"
      :key="index"
      :value="optionSelect.id"
    >
      {{ optionSelect.description }}
    </option>
  </select>
</template>

<script setup lang="ts">
import type { OptionsSelect } from '@/Types/Candidate/typeOptionsSelect'

const emit = defineEmits<{(e: 'update:modelValue', value: string | number): void}>()

interface Props {
  emptyOption?: boolean
  optionsSelect: OptionsSelect[]
  modelValue?: string | number | null | boolean
  emptyOptionName?: string
}

withDefaults(defineProps<Props>(), {
  emptyOption: true,
  modelValue: '',
  emptyOptionName: 'Selecciona'
})

/**
 * Listen the change event on the input select and trigger the emit to parent
 *
 * @param event Event
 */
const changeOption = (event: Event) => {
  const target = event.target as HTMLSelectElement
  const { value } = target

  emit('update:modelValue', value)
}
</script>
