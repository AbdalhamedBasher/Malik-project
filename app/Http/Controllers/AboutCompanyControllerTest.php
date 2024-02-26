use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AboutCompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUpdateAboutCompanyWithLogo()
    {
        Storage::fake('public');

        $about_company = factory(AboutCompany::class)->create();
        $logo = UploadedFile::fake()->image('logo.jpg');

        $response = $this->post('/about-company/update', [
            'name' => 'New Company Name',
            'phone' => '1234567890',
            'email' => 'new@example.com',
            'about' => 'New company description',
            'logo' => $logo,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $about_company->refresh();

        $this->assertEquals('New Company Name', $about_company->name);
        $this->assertEquals('1234567890', $about_company->phone);
        $this->assertEquals('new@example.com', $about_company->email);
        $this->assertEquals('New company description', $about_company->about);
        $this->assertNotNull($about_company->logo);

        Storage::disk('public')->assertExists($about_company->logo);
    }

    public function testUpdateAboutCompanyWithoutLogo()
    {
        $about_company = factory(AboutCompany::class)->create();

        $response = $this->post('/about-company/update', [
            'name' => 'New Company Name',
            'phone' => '1234567890',
            'email' => 'new@example.com',
            'about' => 'New company description',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $about_company->refresh();

        $this->assertEquals('New Company Name', $about_company->name);
        $this->assertEquals('1234567890', $about_company->phone);
        $this->assertEquals('new@example.com', $about_company->email);
        $this->assertEquals('New company description', $about_company->about);
        $this->assertNull($about_company->logo);
    }

    public function testUpdateAboutCompanyWithError()
    {
        $response = $this->post('/about-company/update', []);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }
}
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AboutCompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $about_company = factory(AboutCompany::class)->create();

        $response = $this->get('/about-company');

        $response->assertStatus(200);
        $response->assertViewHas('about_company', $about_company);
    }

    public function testStoreWithLogo()
    {
        Storage::fake('public');

        $logo = UploadedFile::fake()->image('logo.jpg');

        $response = $this->post('/about-company/store', [
            'name' => 'New Company Name',
            'phone' => '1234567890',
            'email' => 'new@example.com',
            'about' => 'New company description',
            'logo' => $logo,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $about_company = AboutCompany::first();

        $this->assertEquals('New Company Name', $about_company->name);
        $this->assertEquals('1234567890', $about_company->phone);
        $this->assertEquals('new@example.com', $about_company->email);
        $this->assertEquals('New company description', $about_company->about);
        $this->assertNotNull($about_company->logo);

        Storage::disk('public')->assertExists($about_company->logo);
    }

    public function testStoreWithoutLogo()
    {
        $response = $this->post('/about-company/store', [
            'name' => 'New Company Name',
            'phone' => '1234567890',
            'email' => 'new@example.com',
            'about' => 'New company description',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $about_company = AboutCompany::first();

        $this->assertEquals('New Company Name', $about_company->name);
        $this->assertEquals('1234567890', $about_company->phone);
        $this->assertEquals('new@example.com', $about_company->email);
        $this->assertEquals('New company description', $about_company->about);
        $this->assertNull($about_company->logo);
    }

    public function testStoreWithError()
    {
        $response = $this->post('/about-company/store', []);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }
}
