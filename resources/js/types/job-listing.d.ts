export interface Skill {
    id: number;
    name: string;
}

export interface JobListing {
    id: number;
    title: string;
    description: string;
    location: string;
    experience: string;
    salary: string;
    company_name: string;
    company_logo: string | null;
    extra: string[] | null;
    skills: Skill[];
    created_at: string;
    updated_at: string;
}
