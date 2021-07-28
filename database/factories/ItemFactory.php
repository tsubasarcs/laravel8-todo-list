<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(140),
            'content' => $this->faker->realText(300),
            'attachment' => ('PHN2ZyB3aWR0aD0iMTE0IiBoZWlnaHQ9IjI5IiB2aWV3Qm94PSIwIDAgMTE0IDI5' .
                'IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjx0aXRsZT5Mb2dvdHlwZTwvdGl0' .
                'bGU+PHBhdGggZD0iTTQuNzczLjkxN3YyMy4wNDZoOC4zMzh2My45NzZILjMzM1YuOTE3aDQuNDR6' .
                'bTI0LjAxIDExLjQ2NVY5Ljk1aDQuMjA4djE3Ljk5aC00LjIwN3YtMi40MzNjLS41NjcuOTAxLTEu' .
                'MzcgMS42MDktMi40MTMgMi4xMjMtMS4wNDIuNTE1LTIuMDkxLjc3Mi0zLjE0Ni43NzItMS4zNjUg' .
                'MC0yLjYxMy0uMjUtMy43NDUtLjc1MmE4Ljc1OCA4Ljc1OCAwIDAgMS0yLjkxNS0yLjA2NiA5LjYg' .
                'OS42IDAgMCAxLTEuODktMy4wMSA5LjcxNyA5LjcxNyAwIDAgMS0uNjc3LTMuNjNjMC0xLjI2LjIy' .
                'NS0yLjQ2NC42NzYtMy42MWE5LjU2IDkuNTYgMCAwIDEgMS44OTEtMy4wMyA4Ljc2NiA4Ljc2NiAw' .
                'IDAgMSAyLjkxNS0yLjA2NWMxLjEzMi0uNTAyIDIuMzgtLjc1MiAzLjc0NS0uNzUyIDEuMDU1IDAg' .
                'Mi4xMDQuMjU3IDMuMTQ2Ljc3MiAxLjA0Mi41MTUgMS44NDYgMS4yMjIgMi40MTMgMi4xMjN6bS0u' .
                'Mzg2IDguNzYzYTYuMjkzIDYuMjkzIDAgMCAwIC4zODctMi4yYzAtLjc3My0uMTMtMS41MDYtLjM4' .
                'Ny0yLjJhNS41OCA1LjU4IDAgMCAwLTEuMDgtMS44MTUgNS4yMzMgNS4yMzMgMCAwIDAtMS42OC0x' .
                'LjIzNmMtLjY1Ni0uMzA4LTEuMzgzLS40NjMtMi4xOC0uNDYzLS43OTkgMC0xLjUyLjE1NS0yLjE2' .
                'My40NjNhNS4yOSA1LjI5IDAgMCAwLTEuNjYgMS4yMzYgNS4zMDcgNS4zMDcgMCAwIDAtMS4wNiAx' .
                'LjgxNCA2LjU2IDYuNTYgMCAwIDAtLjM2OCAyLjJjMCAuNzcyLjEyMiAxLjUwNi4zNjcgMi4yLjI0' .
                'NC42OTYuNTk4IDEuMyAxLjA2MiAxLjgxNWE1LjI3OSA1LjI3OSAwIDAgMCAxLjY2IDEuMjM2Yy42' .
                'NDIuMzA5IDEuMzYzLjQ2MyAyLjE2MS40NjNzMS41MjUtLjE1NCAyLjE4MS0uNDYzYTUuMjIyIDUu' .
                'MjIyIDAgMCAwIDEuNjgtMS4yMzYgNS41NzUgNS41NzUgMCAwIDAgMS4wOC0xLjgxNHptNy45MTQg' .
                'Ni43OTRWOS45NWgxMS40Mjd2NC4xNDFoLTcuMjJ2MTMuODVoLTQuMjA3em0yNi42NzUtMTUuNTU3' .
                'VjkuOTVoNC4yMDh2MTcuOTloLTQuMjA4di0yLjQzM2MtLjU2Ni45MDEtMS4zNyAxLjYwOS0yLjQx' .
                'MyAyLjEyMy0xLjA0Mi41MTUtMi4wOS43NzItMy4xNDYuNzcyLTEuMzY0IDAtMi42MTItLjI1LTMu' .
                'NzQ0LS43NTJhOC43NTggOC43NTggMCAwIDEtMi45MTUtMi4wNjYgOS42IDkuNiAwIDAgMS0xLjg5' .
                'MS0zLjAxIDkuNzE3IDkuNzE3IDAgMCAxLS42NzYtMy42M2MwLTEuMjYuMjI1LTIuNDY0LjY3Ni0z' .
                'LjYxYTkuNTYgOS41NiAwIDAgMSAxLjg5LTMuMDMgOC43NjYgOC43NjYgMCAwIDEgMi45MTYtMi4w' .
                'NjVjMS4xMzItLjUwMiAyLjM4LS43NTIgMy43NDQtLjc1MiAxLjA1NSAwIDIuMTA0LjI1NyAzLjE0' .
                'Ni43NzIgMS4wNDMuNTE1IDEuODQ3IDEuMjIyIDIuNDEzIDIuMTIzem0tLjM4NiA4Ljc2M2E2LjI5' .
                'MyA2LjI5MyAwIDAgMCAuMzg2LTIuMmMwLS43NzMtLjEzLTEuNTA2LS4zODYtMi4yYTUuNTggNS41' .
                'OCAwIDAgMC0xLjA4LTEuODE1IDUuMjMzIDUuMjMzIDAgMCAwLTEuNjgtMS4yMzZjLS42NTYtLjMw' .
                'OC0xLjM4NC0uNDYzLTIuMTgxLS40NjMtLjc5OCAwLTEuNTE5LjE1NS0yLjE2Mi40NjNhNS4yOSA1' .
                'LjI5IDAgMCAwLTEuNjYgMS4yMzYgNS4zMDcgNS4zMDcgMCAwIDAtMS4wNjEgMS44MTQgNi41NiA2' .
                'LjU2IDAgMCAwLS4zNjcgMi4yYzAgLjc3Mi4xMjEgMS41MDYuMzY3IDIuMi4yNDQuNjk2LjU5OCAx' .
                'LjMgMS4wNjEgMS44MTVhNS4yNzkgNS4yNzkgMCAwIDAgMS42NiAxLjIzNmMuNjQzLjMwOSAxLjM2' .
                'NC40NjMgMi4xNjIuNDYzLjc5NyAwIDEuNTI1LS4xNTQgMi4xODEtLjQ2M2E1LjIyMiA1LjIyMiAw' .
                'IDAgMCAxLjY4LTEuMjM2IDUuNTc1IDUuNTc1IDAgMCAwIDEuMDgtMS44MTR6TTg0LjA2MyA5Ljk1' .
                'aDQuMjYyTDgxLjQyIDI3Ljk0SDc2LjEzTDY5LjIyNCA5Ljk1aDQuMjYybDUuMjg5IDEzLjc3Nkw4' .
                'NC4wNjMgOS45NXptMTMuNDQtLjQ2M2M1LjcyOSAwIDkuNjM2IDUuMDc4IDguOTAyIDExLjAyMUg5' .
                'Mi40NDZjMCAxLjU1MiAxLjU2NyA0LjU1MiA1LjI4OCA0LjU1MiAzLjIgMCA1LjM0NS0yLjgxNSA1' .
                'LjM0Ni0yLjgxN2wyLjg0MyAyLjJjLTIuNTQyIDIuNzEzLTQuNjIzIDMuOTYtNy44ODIgMy45Ni01' .
                'LjgyMyAwLTkuNzctMy42ODQtOS43Ny05LjQ1OCAwLTUuMjIzIDQuMDc5LTkuNDU4IDkuMjMxLTku' .
                'NDU4em0tNS4wNDYgNy44OTRoMTAuMDg0Yy0uMDMxLS4zNDYtLjU3OC00LjU1Mi01LjA3Mi00LjU1' .
                'Mi00LjQ5NSAwLTQuOTggNC4yMDYtNS4wMTIgNC41NTJ6bTE2LjY4OCAxMC41NThWLjkxN2g0LjIw' .
                'OHYyNy4wMjJoLTQuMjA4eiIgZmlsbD0iI0ZGMkQyMCIgZmlsbC1ydWxlPSJldmVub2RkIi8+PC9zdmc+'),
        ];
    }
}
