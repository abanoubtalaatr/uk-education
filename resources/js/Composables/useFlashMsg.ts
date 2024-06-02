import type { PushOptions, Push } from "notivue";

export interface MessageNotificationProps {
    // name: string;
    // lastName?: string;
    // isMessageRequest?: boolean;
}

export function pushMessageNotification(
    type: keyof Push = "success",
    {
        props = {} as MessageNotificationProps,
        duration = 3000,
        ...options
    }: PushOptions<MessageNotificationProps>
) {
    notivuePush[type]({
        title: "Message Request", // Default options
        ...options, // Push options
        props: {
            ...props, // Push props
        },
    });
}
