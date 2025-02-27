<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div class="dot" :style="{'background-color': field.frontLeftTireCondition.color}" style="margin-right: 5px" :title="__('Front Left Tire')"/>
            <div class="dot" :style="{'background-color': field.frontRightTireCondition.color}" style="margin-right: 5px" :title="__('Front Right Tire')"/>
            <div class="dot" :style="{'background-color': field.rearLeftTireCondition.color}" style="margin-right: 5px" :title="__('Rear Left Tire')"/>
            <div class="dot" :style="{'background-color': field.rearRightTireCondition.color}" style="margin-right: 5px" :title="__('Rear Right Tire')"/>
        </template>
    </PanelItem>
</template>

<script>
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
}
</script>

<style scoped>
.dot {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    display: inline-block;
}
</style>
