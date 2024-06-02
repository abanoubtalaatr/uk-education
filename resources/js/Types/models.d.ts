export {};
declare global {
    export interface Resource<T> {
        data: T;
    }
    export interface PaginateMeta {
        current_page: number;
        from: number;
        last_page: number;
        links: Link[];
        path: string;
        per_page: number;
        to: number;
        total: number;
    }
    export interface Link {
        url: null | string;
        label: string;
        active: boolean;
    }
    export interface PaginateLinks {
        first: string;
        last: string;
        prev: null;
        next: null;
    }
    export interface PaginatedData<T> {
        meta: PaginateMeta;
        links: PaginateLinks;
        data: T[];
    }

    export interface Link {
        url: null | string;
        label: string;
        active: boolean;
    }

    export interface Brand {
        id: number;
        name: string;
        models: Model[];
        image: string;
        image: string;
    }
    export type Brands = Brand[];

    export interface Type {
        id: number;
        name: string;
    }
    export type Types = Type[];

    export interface Model {
        id: number;
        name: string;
    }
    export type Models = Model[];

    export interface City {
        id: number;
        name: string;
    }
    export type Cities = City[];

    export interface User {
        id: number;
        name: string;
        email: string;
        email_verified_at: Date;
        phone_verified_at: Date;
        two_factor_confirmed_at: null;
        onboarding_step: string;
        job_title: string;
        birth_date: Date;
        gender: string;
        phone: string;
        vehicle_type: null;
        three_habit_certificate: number;
        show_events_my_city: boolean;
        show_events_ksa: boolean;
        show_event_attendance: boolean;
        notifications_via_mail: boolean;
        notifications_via_sms: boolean;
        notifications_via_whatsapp: boolean;
        show_personal_information: boolean;
        completed_onboarding: boolean;
        show_dream_bikes: boolean;
        show_my_bikes: boolean;
        type: string;
        created_at: Date;
        updated_at: Date;
        brand_id: null;
        model: null;
        city_id: number;
        profile_photo_url: string;
        dream_bike_model: null;
        dream_bike_brand: null;
        dream_bike_type: null;
        // relation
        owned_bikes: Bikes;
        events: TEvents;
        interests: Interests;
        city: City;
        is_admin: Boolean;
    }
    export type Users = User[];

    export interface Media {
        id: number;
        model_type: string;
        model_id: number;
        uuid: string;
        collection_name: string;
        name: string;
        file_name: string;
        mime_type: string;
        disk: string;
        conversions_disk: string;
        size: number;
        manipulations: any[];
        custom_properties: any[];
        generated_conversions: any[];
        responsive_images: any[];
        order_column: number;
        created_at: Date;
        updated_at: Date;
        original_url: string;
        preview_url: string;
    }
    export type Medias = Media[];
    export interface TEvent {
        id: number;
        city_id: number;
        district_id: number;
        type_id: number;
        slug: string;
        name: string;
        description: string;
        agenda: string;
        location_link: string;
        start_date: Date;
        end_date: Date;
        created_at: Date;
        updated_at: null;
        images: Medias;
        featured_image: string;
        owned_bikes: Bikes;
        survey_id: number | null;
        attended: boolean;
        attending: boolean;
        number_of_seats: number | null;
        number_of_attendees: number | null;
        // relations
        users: Users;
        interests: Interests;
        city: City;
        survey: Survey;
    }
    export type TEvents = TEvent[];

    export interface Interest {
        id: number;
        name: string;
    }
    export type Interests = Interest[];
    export interface Bike {
        id: number;
        vehicle_type: Type;
        brand: Brand;
        bike_photo: string;
        model: string;
    }
    export type Bikes = Bike[];

    export interface EventType {
        id: number;
        name: string;
    }
    export type EventTypes = EventType[];
    export interface Survey {
        id: number;
        questions: Questions;
        created_at: Date;
        updated_at: Date;
    }
    export type Surveys = Survey[];
    export interface Question {
        id: number;
        name: string;
        type: "single" | "multiple";
        options: string[];
        created_at: Date;
        updated_at: Date | null;
    }
    export type Questions = Question[];
}
