<template>
  <div class="inline-block">
    <div
      ref="referenceRef"
      class="inline-block"
      @blur="hide"
      @focus="show"
      @mouseenter="show"
      @mouseleave="hide"
    >
      <slot />
    </div>

    <div
      ref="floatingRef"
      :class="[
        'absolute top-0 left-0 z-50 font-semibold text-sm p-2 bg-orange-500 text-center border-2 border-yellow-300 rounded-xl shadow-sm text-white cursor-default max-w-[320px]',
        isHidden && 'hidden', width
      ]"
    >
      {{ props.content }}
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { computePosition, flip, offset, shift } from '@floating-ui/dom'

const props = defineProps({
  content: String,
  placement: {
    type: String,
    default: 'bottom'
  },
  width: {
    type: String,
    default: 'min-w-[130px]'
  }
})

const floatingRef = ref()
const referenceRef = ref()
const isHidden = ref(true)

const calculatePosition = async () => {
  const { x, y } = await computePosition(
    referenceRef.value,
    floatingRef.value,
    {
      placement: props.placement,
      middleware: [
        offset(2),
        flip(),
        shift({ padding: 5 })
      ]
    }
  )

  Object.assign(floatingRef.value.style, {
    left: `${x}px`,
    top: `${y}px`
  })
}

const hide = () => {
  isHidden.value = true
}

const show = () => {
  isHidden.value = false
  calculatePosition()
}

</script>
