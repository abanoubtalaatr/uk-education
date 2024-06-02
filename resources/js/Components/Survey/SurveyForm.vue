<script setup lang="ts">
import { v4 as uuid } from "uuid";
import Checkbox from "../Checkbox.vue";
const page = usePage();
const survey = computed<Resource<Survey>>(() => page.props.survey);
const formId = `form-${uuid()}`;
const showSurvey = defineModel<boolean>("open", { default: false });
type TAnswer = {
    question_id: number;
    answer: string | string[];
};
const surveyForm = useForm<{ answers: TAnswer[] }>({
    survey_id: survey.value.data.id,
    answers: [],
});
watch(
    () => survey.value,
    () => {
        surveyForm.answers = survey.value.data?.questions?.map((q) => {
            if (q.type === "multiple") {
                return {
                    question_id: q.id,
                    answer: [],
                };
            }
            return {
                question_id: q.id,
                answer: "",
            };
        });
    },
    {
        immediate: true,
    }
);
const submitSurvey = () => {
    surveyForm.post(route("answers.store"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            showSurvey.value = false;
            surveyForm.reset();
        },
    });
};
</script>
<template>
    <Dialog v-model:open="showSurvey" :title="$t('survey')">
        <Form
            @submit="submitSurvey"
            :id="formId"
            v-if="surveyForm.answers.length"
        >
            <template
                v-for="(field, index) in survey.data.questions"
                :key="index"
            >
                <FormField :label="field.name" :error="''">
                    <template v-if="field.type === 'single'">
                        <Input v-model="surveyForm.answers[index].answer" />
                    </template>
                    <template v-if="field.type === 'multiple'">
                        <div class="grid gap-3">
                            <template
                                v-for="option in field.options"
                                :key="option.id"
                            >
                                <Checkbox
                                    v-model="surveyForm.answers[index].answer"
                                    :label="option"
                                    :value="option"
                                />
                            </template>
                        </div>
                    </template>
                </FormField>
            </template>
        </Form>
        <template #footer>
            <DialogClose />
            <Button
                :form="formId"
                type="submit"
                :loading="surveyForm.processing"
                :label="$t('send-survey')"
            />
        </template>
    </Dialog>
</template>
