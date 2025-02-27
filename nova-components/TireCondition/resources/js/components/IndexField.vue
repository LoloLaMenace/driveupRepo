<template>
    <div>
        <div class="dot" :style="{'background-color': field.frontLeftTireCondition.color}" style="margin-right: 5px" :title="__('Front Left Tire')"/>
        <div class="dot" :style="{'background-color': field.frontRightTireCondition.color}" style="margin-right: 5px" :title="__('Front Right Tire')"/>
        <div class="dot" :style="{'background-color': field.rearLeftTireCondition.color}" style="margin-right: 5px" :title="__('Rear Left Tire')"/>
        <div class="dot" :style="{'background-color': field.rearRightTireCondition.color}" style="margin-right: 5px" :title="__('Rear Right Tire')"/>
    </div>
</template>

<script>
import DetailField from "./DetailField.vue";

export default {
  props: ['resourceName', 'field'],

  computed: {
    fieldValue() {
      return this.field.displayedAs || this.field.value
    },
  }
}
</script>

<style scoped>
.dot {
    height: 10px;
    width: 10px;
    border-radius: 50%;
    display: inline-block;
}
</style>
